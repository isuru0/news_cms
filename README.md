# Headline Hub (PHP News CMS)

This is a simple PHP + MySQL news CMS. Follow these steps to run it locally on Windows.

## Prerequisites
- PHP 7.4+ (PHP 8.x works) with the `mysqli` extension enabled
- MySQL Server (or MariaDB)
- Optional: XAMPP/WAMP (bundles PHP + MySQL + phpMyAdmin)

## 1) Database setup
Use either the provided SQL file or phpMyAdmin to create the database and table.

Option A — MySQL Shell (PowerShell):
```powershell
# From the project folder
mysql -u root -p < .\database.sql
```

Option B — phpMyAdmin:
- Open phpMyAdmin
- Import the file `database.sql` from the project root

What this creates:
- Database: `db_news_cms`
- Table: `posts` with columns: `id`, `date`, `title`, `content`, `image_path`

Note: The project stores date as a string (format `Y/m/d`), so the `date` column is a VARCHAR.

## 2) Configure DB connection (if needed)
Default credentials are set in `connect.php`:
- Host: `localhost`
- User: `root`
- Password: empty
- DB: `db_news_cms`

If your MySQL setup differs, edit `connect.php` to match your credentials.

## 3) Start the app
Option A — PHP built-in server (quickest):
```powershell
# In the project folder: d:\OFFICIAL\Programming\Web\Projects\00 News CMS\news_cms
php -S localhost:8000 -t .
```
Then open:
- Site: http://localhost:8000/
- Admin: http://localhost:8000/admin/

Option B — XAMPP/WAMP:
- Copy/move the `news_cms` folder into your web root (e.g., `C:\xampp\htdocs\news_cms`)
- Start Apache + MySQL
- Open http://localhost/news_cms/

## 4) File uploads
- Uploads are stored in `admin/post_images_upload/` (already included)
- Ensure this folder is writable by PHP (on Windows, your user account typically has write access when running locally)

## 5) Admin notes
- There is no authentication implemented; the admin area is open by default. Use only locally.
- After updating a post with a new image, `admin/cleanup_images.php` can remove unused images.

## Troubleshooting
- If you see "database is not connected!", verify your MySQL is running and credentials in `connect.php` are correct.
- If images don’t show on the homepage, ensure `image_path` values look like `post_images_upload/yourfile.jpg` and that files exist under `admin/post_images_upload/`.
- If file uploads fail, check `file_uploads` is `On` and `upload_max_filesize`/`post_max_size` in your `php.ini` are large enough (e.g., 10M).
