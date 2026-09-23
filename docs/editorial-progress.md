# Editorial Development Progress

Cập nhật gần nhất: 23/09/2026  
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

- [ ] Audit lại UI trước khi sửa
- [x] Inline validation
- [x] Loading state
- [x] Feedback UI
- [ ] Mobile polish

### Homepage

- [ ] Skeleton loading
- [x] Card image hover đã tồn tại trong source
- [ ] Normalize spacing theo token Phase 2

### Category

- [ ] Masonry view cho Nghệ thuật & Văn hóa
- [x] Lưu bài dùng thư viện theo tài khoản
- [ ] Kiểm thử Grid/Compact responsive

### Article Detail

- [x] Estimated reading time
- [x] Automatic table of contents
- [x] Share/copy actions
- [x] Related content
- [ ] Hoàn thiện và kiểm thử resume reading progress

## Phase 4 — Polish

Chưa bắt đầu.

- [ ] Page transitions
- [ ] Global toast system
- [x] Back-to-top đã tồn tại trên giao diện editorial
- [ ] Dark mode
- [x] Reduced-motion rule đã có một phần trong CSS editorial

## Quy tắc commit

- Một chức năng hoàn chỉnh = test + một commit riêng.
- Chỉ stage đúng file thuộc task; không dùng `git add .`.
- Không commit `includes/config.inc.php`, `templates_c/`, `.vscode/`, database dump hoặc file backup.
- Bug phát hiện trong test phải có commit `fix(...)` riêng.
- Không empty commit, không commit giả, không squash nếu người dùng chưa yêu cầu.
