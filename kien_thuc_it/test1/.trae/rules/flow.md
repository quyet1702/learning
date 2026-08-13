Mục tiêu
- Luôn xác định chủ đề theo câu hỏi, map sang module liên quan trong `.trae/modules`, và GIỚI HẠN phạm vi đọc dữ liệu đúng theo chủ đề đó.
- Ưu tiên tìm-đọc có mục tiêu (glob/grep) thay vì đọc toàn bộ.

Quy tắc xác định chủ đề
- Trích “ý định chính” từ câu hỏi (UI/React → frontend; API/DB → backend; meta-về-luồng → backend mặc định).
- Chọn 1 module duy nhất khớp nhất. Nếu không rõ: hỏi lại để làm rõ trước khi đọc thêm.

Phạm vi đọc mặc định (theo chủ đề)
- Frontend: chỉ đọc trong các thư mục UI (components/pages/styles/src tương ứng), và config FE khi liên quan trực tiếp.
- Backend: chỉ đọc trong server/api/services/db/config/migrations/schema khi liên quan trực tiếp.
- Tránh đọc: node_modules, dist, build artifacts, .git, logs, assets nặng… trừ khi câu hỏi yêu cầu rõ.

Trình tự thực thi (Flow = What)
1) Phân tích câu hỏi → xác định module mục tiêu và liệt kê đuôi file + thư mục liên quan.
2) Dùng Glob để liệt kê file theo pattern trong phạm vi đã giới hạn.
3) Dùng Grep để tìm chuỗi/regex trong phạm vi file đã liệt kê (giới hạn glob/type).
4) Chỉ dùng Read để đọc đoạn cần thiết quanh dòng match (offset/limit), tránh đọc toàn bộ.
5) Nếu thiếu thông tin, mở rộng phạm vi TỪ TỪ (thêm 1–2 pattern hoặc 1 thư mục liền kề) và nêu lý do.
6) Nếu cần mở rộng lớn, yêu cầu người dùng xác nhận hoặc chỉ định phạm vi.

Quy tắc sử dụng công cụ
- Glob: pattern cụ thể theo module; không quét root rộng nếu chưa có xác nhận.
- Grep: luôn giới hạn file bằng glob/type; ưu tiên "files_with_matches" trước rồi mới xem "content".
- Read: ưu tiên đọc đoạn; chỉ đọc toàn file khi (a) user chỉ đích danh file, hoặc (b) file nhỏ, hoặc (c) có xác nhận.

Mở rộng có kiểm soát
- Chỉ mở rộng khi không có match và có giả thuyết hợp lý về nơi đặt file.
- Ghi lại thay đổi phạm vi (pattern/thư mục mới) và lý do.

Đầu ra bắt buộc
- Nêu rõ: module đã chọn, phạm vi thư mục, pattern glob, regex grep, và file/đoạn đã đọc.
- Chỉ trích xuất phần cần thiết để trả lời; tránh dump dài.

Đồng bộ với modules
- Frontend: theo `.trae/modules/frontend/_shared.md`
- Backend/meta: theo `.trae/modules/backend/_shared.md`