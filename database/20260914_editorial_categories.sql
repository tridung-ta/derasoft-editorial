-- Editorial categories for store 1. Safe to run repeatedly.
SET NAMES utf8mb4;
INSERT INTO dc_article_categories (parent_id,store_id,slug,name,keyword,description,position,status,check_duplicate_title,sort_key,sort_direction,layout,items_per_page)
SELECT 0,1,x.slug,x.name,x.name,x.description,x.position,1,1,'date_created','DESC','1column_rows',12
FROM (
 SELECT 'van-tho' slug,'Văn thơ' name,'Tác phẩm văn học, thơ và văn xuôi.' description,10 position
 UNION ALL SELECT 'nghe-thuat','Nghệ thuật','Âm nhạc, mỹ thuật, sân khấu và văn hóa.',20
 UNION ALL SELECT 'tin-tuc-moi','Tin tức','Tin tức và hoạt động mới.',30
 UNION ALL SELECT 'video','Video','Video, phỏng vấn và đối thoại nghệ thuật.',40
) x WHERE NOT EXISTS (SELECT 1 FROM dc_article_categories c WHERE c.store_id=1 AND c.slug=x.slug);

INSERT INTO dc_article_categories (parent_id,store_id,slug,name,keyword,description,position,status,check_duplicate_title,sort_key,sort_direction,layout,items_per_page)
SELECT p.id,1,x.slug,x.name,x.name,x.name,x.position,1,1,'date_created','DESC','1column_rows',12
FROM (
 SELECT 'van-tho' parent_slug,'tho' slug,'Thơ' name,10 position
 UNION ALL SELECT 'van-tho','van-xuoi','Văn xuôi',20
 UNION ALL SELECT 'nghe-thuat','am-nhac','Âm nhạc',10
 UNION ALL SELECT 'nghe-thuat','my-thuat','Mỹ thuật',20
 UNION ALL SELECT 'nghe-thuat','san-khau-nghe-thuat','Sân khấu',30
 UNION ALL SELECT 'nghe-thuat','van-hoa','Văn hóa',40
) x INNER JOIN dc_article_categories p ON p.store_id=1 AND p.slug=x.parent_slug
WHERE NOT EXISTS (SELECT 1 FROM dc_article_categories c WHERE c.store_id=1 AND c.slug=x.slug);

