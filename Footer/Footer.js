function handleButtonClick(action) {
    switch (action) {
        case 'chinh_sach':
            alert("Chính sách được chọn");
            break;
        case 'chinh_sach_quy_dinh':
            alert("Chính sách và quy định được chọn");
            break;
        case 'quy_che_hoat_dong':
            alert("Quy chế hoạt động được chọn");
            break;
        case 'bao_mat_thong_tin':
            alert("Bảo mật thông tin được chọn");
            break;
        case 'giai_quyet_tranh_chap':
            alert("Giải quyết tranh chấp được chọn");
            break;
        case 'huong_dan_chung':
            alert("Hướng dẫn chung được chọn");
            break;
        case 'dat_hang':
            alert("Hướng dẫn đặt hàng được chọn");
            break;
        case 'thanh_toan':
            alert("Hướng dẫn thanh toán được chọn");
            break;
        case 'hoi_va_tra_loi':
            alert("Hỏi và trả lời được chọn");
            break;
        case 've_chapter_one':
            alert("Về Chapter One được chọn");
            break;
        case 'blog':
            alert("Chapter One Blog được chọn");
            break;
        case 'tuyen_dung':
            alert("Tuyển dụng được chọn");
            break;
        default:
            console.error("Không có hành động phù hợp cho: " + action);
    }
}