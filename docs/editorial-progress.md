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
- [ ] Chờ duyệt trước khi triển khai

Tài liệu: `docs/editorial-comments-audit.md`

## Quy tắc commit

- Một chức năng hoàn chỉnh = test + một commit riêng.
- Chỉ stage đúng file thuộc task; không dùng `git add .`.
- Không commit `includes/config.inc.php`, `templates_c/`, `.vscode/`, database dump hoặc file backup.
- Bug phát hiện trong test phải có commit `fix(...)` riêng.
- Không empty commit, không commit giả, không squash nếu người dùng chưa yêu cầu.
