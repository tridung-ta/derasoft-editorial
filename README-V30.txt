DERACMS V30 - DONG BO FRONTEND VI / EN / ZH

- Dong bo menu desktop va mobile, URL, breadcrumb, danh muc, nut chuc nang, trang rong va footer.
- EN chi hien bai co slug_en, lang en va noi dung EN.
- ZH chi hien bai co slug_zh, lang zh va noi dung ZH.
- VI chi hien noi dung VI.
- Bai RSS moi duoc dich truoc khi kich hoat ngon ngu EN/ZH.
- Khong sua Admin, authentication hay cau truc database.

Trien khai: tai de modules, templates va cron vao public_html; sau do xoa file ben trong templates_c.

Backfill bai RSS da nhap:
cd /home/dung/domains/dung.derasoft.com/public_html && /usr/local/bin/php cron/editorial-rss-import.php --commit --backfill-translations --limit=1

Cron nhap bai moi:
cd /home/dung/domains/dung.derasoft.com/public_html && /usr/local/bin/php cron/editorial-rss-import.php --commit --limit=1
