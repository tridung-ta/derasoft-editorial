# Editorial Development Progress

Cập nhật gần nhất: 24/09/2026  
Nhánh làm việc: `feature/ten-chuc-nang`

## Phase 1 — Audit & Baseline

- [x] Kiểm tra Git baseline
- [x] Lập bản đồ module/template/CSS/JS/DAO
- [x] Đối chiếu roadmap với source hiện tại
- [x] Kiểm tra PHP syntax cho các file trọng yếu
- [x] Ghi nhận rủi ro auth, library, CSS, Git và database
- [ ] Responsive visual test tại 375px / 768px / 1440px — blocker: chưa có browser automation khả dụng
- [ ] Lighthouse Homepage / Article Detail — blocker: chưa có browser/Lighthouse và trang nội dung yêu cầu phiên đăng nhập
- [x] Commit tài liệu baseline

Tài liệu: `docs/editorial-phase1-audit.md`

## Phase 2 — Design System

Chưa bắt đầu. Chỉ thực hiện sau khi người dùng duyệt Phase 1.

- [x] Global editorial color tokens
- [x] Typography scale
- [x] Spacing scale
- [x] Buttons
- [x] Article cards
- [x] Category badges

## Phase 3 — Page Improvements

Chưa bắt đầu.

### Authentication

- [x] Audit lại UI trước khi sửa
- [x] Inline validation
- [x] Loading state
- [x] Feedback UI
- [x] Mobile polish

### Homepage

- [x] Skeleton loading
- [x] Card image hover đã tồn tại trong source
- [x] Normalize spacing theo token Phase 2
- [x] Loại nội dung trùng giữa Cover/Featured và Trending

### Category

- [x] Masonry view cho Nghệ thuật & Văn hóa
- [x] Lưu bài dùng thư viện theo tài khoản
- [x] Kiểm thử Grid/Compact responsive

### Article Detail

- [x] Estimated reading time
- [x] Automatic table of contents
- [x] Share/copy actions
- [x] Related content
- [x] Hoàn thiện và kiểm thử resume reading progress

## Phase 4 — Polish

Đã hoàn thành và đã kiểm tra trên production.

- [x] Page transitions
- [x] Global toast system
- [x] Back-to-top đã tồn tại trên giao diện editorial
- [x] Dark mode
- [x] Reduced-motion hoàn chỉnh cho các tương tác editorial mới

## Feature Roadmap — Nhóm trung bình

### Đánh giá bài viết

- [x] Tạo bảng đánh giá editorial riêng, không trộn dữ liệu comment/sản phẩm legacy
- [x] Một tài khoản chỉ có một đánh giá cho mỗi bài và được phép cập nhật mức sao
- [x] Bảo vệ endpoint bằng đăng nhập, CSRF và giới hạn tần suất
- [x] Giao diện 5 sao responsive, hỗ trợ VI/EN/中文
- [x] Migration và rollback riêng
- [x] Chạy migration và kiểm tra hoạt động trên production

Commits:

- `37f2b84` — `feat(rating): add secure editorial rating data layer`
- `4633f77` — `feat(article): add member rating interface`
- `c1e4495` — `fix(smarty): escape dark mode bootstrap script`
- `7a7202f` — `refactor(header): remove redundant global search`

### Bình luận bài viết

- [x] Audit hệ bình luận legacy và luồng kiểm duyệt hiện có
- [x] Lập kế hoạch dữ liệu/API/giao diện an toàn
- [x] Tạo migration và rollback cho bảng bình luận editorial riêng
- [x] Hoàn thiện API yêu cầu đăng nhập, CSRF, validation và rate limit
- [x] Hoàn thiện giao diện bình luận đa ngôn ngữ trên trang bài viết
- [x] Hoàn thiện màn hình kiểm duyệt bình luận trong Admin
- [x] Chạy migration và kiểm tra hoạt động trên production

Tài liệu: `docs/editorial-comments-audit.md`

Commits:

- `e75c4a1` — `feat(comments): add editorial comment persistence layer`
- `4fc0a10` — `feat(comments): add secure article comment API`
- `297bc09` — `feat(article): add member comment interface`
- `c683e62` — `feat(admin): add editorial comment moderation`

### Trang tác giả

- [x] Audit dữ liệu tác giả, route và giao diện hiện có
- [x] Lập kế hoạch triển khai không thay đổi database
- [x] Thêm route VI/EN/中文 và trang danh sách bài viết theo tác giả
- [x] Chỉ công khai tên hiển thị, avatar và giới thiệu đã lọc
- [x] Liên kết tên tác giả trên trang chi tiết bài viết
- [x] Kiểm tra PHP syntax và Git diff
- [ ] Kiểm tra giao diện và route trên production

Tài liệu: `docs/editorial-author-page-audit.md`

Commits:

- `414e128` — `feat(author): add public editorial author page`
- `dad2612` — `feat(article): link article byline to author profile`
- `131dc29` — `fix(author): use existing localized biography fields`

### Hệ thống tag

- [x] Audit cơ chế nhóm bài viết và dữ liệu gắn bài hiện có
- [x] Lập kế hoạch tái sử dụng `article_groups`, không thay đổi database
- [x] Chuẩn hóa cách lấy nhóm bài đang hoạt động và fallback đa ngôn ngữ
- [x] Hiển thị tag và liên kết chủ đề trên trang chi tiết bài viết
- [x] Thêm trang lưu trữ tag VI/EN/中文, phân trang và 404
- [x] Kiểm tra PHP syntax, Smarty compile và Git diff
- [ ] Kiểm tra giao diện và route trên production

Tài liệu: `docs/editorial-tags-audit.md`

Commits:

- `c1aed0d` — `refactor(tags): expose safe editorial article groups`
- `78a09dd` — `feat(article): display editorial tags on article detail`
- `8998637` — `feat(tags): add public editorial tag archive`

### Newsletter

- [x] Audit dữ liệu email, footer, mail transport và luồng unsubscribe hiện có
- [x] Lập kế hoạch tách subscriber có consent khỏi dữ liệu comment/customer
- [ ] Chờ duyệt migration bảng subscriber mới và phạm vi giai đoạn đầu

Tài liệu: `docs/editorial-newsletter-audit.md`

## Quy tắc commit

- Một chức năng hoàn chỉnh = test + một commit riêng.
- Chỉ stage đúng file thuộc task; không dùng `git add .`.
- Không commit `includes/config.inc.php`, `templates_c/`, `.vscode/`, database dump hoặc file backup.
- Bug phát hiện trong test phải có commit `fix(...)` riêng.
- Không empty commit, không commit giả, không squash nếu người dùng chưa yêu cầu.
