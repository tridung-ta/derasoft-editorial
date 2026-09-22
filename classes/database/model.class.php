<?php
/*************************************************************************
Class Model
----------------------------------------------------------------
DeraCMS 4.0 Project
Company: Derasoft Co., Ltd
Last updated: 03/06/2025
Coder: Mai Minh
**************************************************************************/
class Model {
	var $_db;
	var $table = '';
	var $fields = array();

/*-----------------------------------------------------------------------*
* Function: Constructor
* Parameter: DB , Table, Fields
* Return: No return
*-----------------------------------------------------------------------*/
	function __construct($db = '', $table = '', $fields = array()) {
		$this->_db = $db;
		$this->table = $table;
		$this->fields = $fields;
	}

	 /**
     * Kiểm tra tên bảng hoặc tên cột.
     */
    protected function isValidIdentifier($name) {
        return is_string($name)
            && preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $name);
    }

    /**
     * Bọc tên cột an toàn.
     */
    protected function quoteIdentifier($name) {
        if (!$this->isValidIdentifier($name)) {
            return false;
        }

        return '`' . $name . '`';
    }

    /**
     * Escape giá trị theo kết nối mysqli hiện tại.
     */
    protected function escapeValue($value) {
        if ($value === null) {
            return 'NULL';
        }

        if (!isset($this->_db->connection)) {
            return "'" . addslashes((string)$value) . "'";
        }

        return "'" . mysqli_real_escape_string(
            $this->_db->connection,
            (string)$value
        ) . "'";
    }

    /**
     * Tạo điều kiện WHERE từ mảng.
     *
     * Ví dụ:
     * array(
     *     'status' => 1,
     *     'store_id' => 2
     * )
     */
    protected function buildWhere($conditions, &$values) {
        $values = array();

        if (!$conditions) {
            return '1=1';
        }

        $where = array();

        foreach ($conditions as $field => $value) {
            $column = $this->quoteIdentifier($field);

            if ($column === false) {
                return false;
            }

            if (is_array($value)) {
                if (!$value) {
                    return '1=0';
                }

                $items = array();

                foreach ($value as $item) {
                    $items[] = $this->escapeValue($item);
                }

                $where[] = $column . ' IN (' . implode(',', $items) . ')';
            } elseif ($value === null) {
                $where[] = $column . ' IS NULL';
            } else {
                $where[] = $column . ' = ' . $this->escapeValue($value);
            }
        }

        return implode(' AND ', $where);
    }

    /**
     * Truy vấn SELECT an toàn hơn bằng mảng điều kiện.
     */
    function selectWhere(
        $fields = '*',
        $conditions = array(),
        $sort = array(),
        $start = 0,
        $limit = 0
    ) {
        if (!$this->isValidIdentifier($this->table)) {
            return array();
        }

        $where = $this->buildWhere($conditions, $unusedValues);

        if ($where === false) {
            return array();
        }

        $start = max(0, (int)$start);
        $limit = max(0, (int)$limit);

        if ($fields === '*') {
            $fieldSql = '*';
        } else {
            $fieldNames = array();

            foreach ((array)$fields as $field) {
                $column = $this->quoteIdentifier($field);

                if ($column === false) {
                    return array();
                }

                $fieldNames[] = $column;
            }

            $fieldSql = implode(',', $fieldNames);
        }

        $sql = 'SELECT ' . $fieldSql
            . ' FROM `' . $this->table . '`'
            . ' WHERE ' . $where;

        if ($sort) {
            $orderItems = array();

            foreach ($sort as $field => $direction) {
                $column = $this->quoteIdentifier($field);
                $direction = strtoupper($direction);

                if (
                    $column === false ||
                    !in_array($direction, array('ASC', 'DESC'), true)
                ) {
                    return array();
                }

                $orderItems[] = $column . ' ' . $direction;
            }

            $sql .= ' ORDER BY ' . implode(',', $orderItems);
        }

        if ($limit > 0) {
            $sql .= ' LIMIT ' . $start . ',' . $limit;
        }

        return $this->query($sql);
    }

    /**
     * Thêm dữ liệu với kiểm tra tên cột.
     */
    function addSafe($fields = array()) {
        if (!$fields || !$this->isValidIdentifier($this->table)) {
            return 0;
        }

        $fieldSql = array();
        $valueSql = array();

        foreach ($fields as $field => $value) {
            $column = $this->quoteIdentifier($field);

            if ($column === false) {
                return 0;
            }

            $fieldSql[] = $column;
            $valueSql[] = $this->escapeValue($value);
        }

        $sql = 'INSERT INTO `' . $this->table . '` ('
            . implode(',', $fieldSql)
            . ') VALUES ('
            . implode(',', $valueSql)
            . ')';

        if (SHOW_QUERY) {
            echo htmlspecialchars($sql, ENT_QUOTES, 'UTF-8');
        }

        if ($this->_db->query($sql)) {
            return $this->_db->getInsertId();
        }

        return 0;
    }

    /**
     * Cập nhật theo các điều kiện bằng nhau.
     */
    function updateWhere($fields = array(), $conditions = array()) {
        if (
            !$fields ||
            !$conditions ||
            !$this->isValidIdentifier($this->table)
        ) {
            return 0;
        }

        $setItems = array();

        foreach ($fields as $field => $value) {
            $column = $this->quoteIdentifier($field);

            if ($column === false) {
                return 0;
            }

            $setItems[] = $column . ' = ' . $this->escapeValue($value);
        }

        $where = $this->buildWhere($conditions, $unusedValues);

        if ($where === false) {
            return 0;
        }

        $sql = 'UPDATE `' . $this->table . '` SET '
            . implode(',', $setItems)
            . ' WHERE ' . $where;

        if (SHOW_QUERY) {
            echo htmlspecialchars($sql, ENT_QUOTES, 'UTF-8');
        }

        return $this->_db->query($sql) ? 1 : 0;
    }

    /**
     * Xóa theo điều kiện bằng nhau.
     */
    function deleteWhere($conditions = array()) {
        if (!$conditions || !$this->isValidIdentifier($this->table)) {
            return 0;
        }

        $where = $this->buildWhere($conditions, $unusedValues);

        if ($where === false) {
            return 0;
        }

        $sql = 'DELETE FROM `' . $this->table . '` WHERE ' . $where;

        if (SHOW_QUERY) {
            echo htmlspecialchars($sql, ENT_QUOTES, 'UTF-8');
        }

        return $this->_db->query($sql) ? 1 : 0;
    }

/*-----------------------------------------------------------------------*
* Function: Select
* Parameter: Condition, Order, Limit, Value
* Return: Return an array
*-----------------------------------------------------------------------*/
	function select($fields = '*', $condition = '1>0', $sort = array(), $start = '0', $limit = 0){
		$sql = 'SELECT '.$fields.' FROM `'.$this->table.'` WHERE '.$condition;
		$order_sql = '';
		if($sort) {
			$order_sql = ' ORDER BY ';
			$i = 0;
			foreach($sort as $field => $order) {
				$order_sql .= "`$field` $order".($i < count($sort) - 1?',':'');
				$i++;
			}
		}
		$sql .= $order_sql;
		if ($limit != 0){
			$sql = $sql." LIMIT $start,$limit";
		}
		#echo $sql.'<br>';
		if(SHOW_QUERY) echo $sql.'<br>';
		$result = $this->_db->query($sql);
		if($result) {
			$data = array();
			while($row = $this->_db->fetchArray($result)) {
				$data[] = $row;
			}
			$this->_db->freeResult($result);
			return $data;
		}
		return 0;
	}


/*-----------------------------------------------------------------------*
* Function: Add
* Parameter: fields, primary key, primary value (pass -1 to use the value from fields array
* Return: New insert ID if OK, 0 if failed
*-----------------------------------------------------------------------*/
function add($fields = '', $pk = 'id', $pkValue = 'NULL') {
	if(!$fields) $fields = $this->fields;
	$numFields = count($fields);
	if($numFields){
		$sql = "INSERT INTO `".$this->table."`";
		$fieldList = '';
		$valueList = '';
		$i = 0;
		foreach($fields as $fieldName => $fieldValue) {
			$fieldList .= "`$fieldName`";
			// ===== Xử lý giá trị =====
			if ($pk == $fieldName && $pkValue != -1) {
				// Nếu là primary key và không phải auto increment
				$value = $pkValue;
			} else {
				if ($fieldValue === null) {
					$value = "NULL";
				} else {
					$value = "'" . addslashes((string)$fieldValue) . "'";
				}
			}
			$valueList .= $value;
			if($i < $numFields - 1) {
				$fieldList .= ',';
				$valueList .= ',';
			}
			$i++;
		}
		$sql .= " ($fieldList) VALUES ($valueList)";
		if(SHOW_QUERY) echo $sql;
		if($this->_db->query($sql))
			return $this->_db->getInsertId();
	}
	return 0;
}

/*-----------------------------------------------------------------------*
* Function: Delete
* Parameter: condition
* Return: 1 if OK, 0 if failed
*-----------------------------------------------------------------------*/
	function delete($condition = '1<0') {
	 	$sql = "DELETE FROM `".$this->table."` WHERE $condition";
		if(SHOW_QUERY) echo $sql;
		if($this->_db->query($sql)) return 1;
		return 0;
	}

/*-----------------------------------------------------------------------*
* Function: Update
* Parameter: fields and condition
* Return: 1 if OK, 0 if failed
*-----------------------------------------------------------------------*/
function update($fields = '', $condition = '1<0') {
    if (!$fields) $fields = $this->fields;

    $numFields = count($fields);

    if ($numFields) {
        $sql = "UPDATE `" . $this->table . "` SET ";

        $i = 0;
        foreach ($fields as $fieldName => $fieldValue) {

            if ($fieldValue === null) {
                $value = "NULL";
            } else {
                $value = "'" . addslashes((string)$fieldValue) . "'";
            }

            $sql .= "`$fieldName` = $value" . ($i < $numFields - 1 ? ',' : '');
            $i++;
        }

        $sql .= " WHERE $condition";

        if (SHOW_QUERY) echo $sql;

        if ($this->_db->query($sql)) return 1;
    }

    return 0;
}

/*-----------------------------------------------------------------------*
* Function: Get number of records and pages
* Parameter: pk, condition and items per page
* Return: pages, rows
*-----------------------------------------------------------------------*/
	function getNumItems($pk = 'id', $condition = '1>0', $items_per_page = DEFAULT_ADMIN_ROWS_PER_PAGE) {
		$rows = 0;
		$pages = 1;
		$return = array();
		$sql = "SELECT COUNT(`$pk`) FROM `".$this->table."` WHERE $condition";
		if(SHOW_QUERY) echo $sql;
		if($this->_db->query($sql)) $rows = $this->_db->fetchRow();
		if($rows) {
			$pages = ceil($rows[0]/$items_per_page);
			$return = array('rows'=>$rows[0],'pages'=>$pages);
			return $return;
		}
		return 0;
	}

	function countItems($pk = 'id', $condition = '1>0') {
		$return = array();
		$sql = "SELECT COUNT(`$pk`) FROM `".$this->table."` WHERE $condition";
		if(SHOW_QUERY) echo $sql;
		if($this->_db->query($sql)) $rows = $this->_db->fetchRow();
		if($rows) {
			$return = $rows[0];
			return $return;
		}
		return 0;
	}

	// PO
	function query($sql) {
		$result = $this->_db->query($sql);
		if($result) {
			$data = array();
			while($row = $this->_db->fetchArray($result)) {
				$data[] = $row;
			}
			$this->_db->freeResult($result);
			return $data;
		}
		return 0;
	}


}
?>
