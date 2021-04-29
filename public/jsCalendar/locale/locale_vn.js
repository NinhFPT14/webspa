/*

@license
dhtmlxScheduler v.5.3.11 Professional Evaluation

This software is covered by DHTMLX Evaluation License. Contact sales@dhtmlx.com to get Commercial or Enterprise license. Usage without proper license is prohibited.

(c) XB Software Ltd.

*/
Scheduler.plugin(function(e) {
    e.locale = {
        date: { month_full: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8 ", " Tháng 9 ", " Tháng 10 ", " Tháng 11 ", " Tháng 12 "], month_short: [" Tháng 1 ", " Tháng 2 ", " Tháng 3 ", " Tháng 4 ", " Tháng 5 ", " Tháng 6 ", " Tháng 7 ", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"], day_full: ["Chủ nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy "], day_short: [" CN ", " Mon ", " Tue ", " Wed ", " Thu ", " Fri ", " Sat "] },
        labels: {
            dhx_cal_today_button: "Hôm Nay",
            day_tab: "Ngày",
            week_tab: "Tuần",
            month_tab: "Tháng",
            new_event: "Sự kiện mới",
            icon_save: "Lưu",
            icon_cancel: "Tắt",
            icon_details: "Chi tiết",
            icon_edit: "Chỉnh sửa",
            icon_delete: "Xóa",
            confirm_closing: "",
            confirm_deleting: "Sự kiện sẽ bị xóa vĩnh viễn, bạn có chắc không?",
            section_description: "Description",
            section_time: "Khoảng thời gian",
            full_day: "Cả ngày",
            confirm_recurring: "Bạn có muốn chỉnh sửa toàn bộ tập hợp các sự kiện lặp lại không?",
            section_recurring: "Lặp lại sự kiện",
            button_recurring: "Đã tắt",
            button_recurring_open: "Đã bật",
            button_edit_series: "Chỉnh sửa chuỗi",
            button_edit_occurrence: "Chỉnh sửa lần xuất hiện",
            agenda_tab: "Agenda",
            date: "Ngày",
            description: "Description",
            year_tab: "Năm",
            week_agenda_tab: "Agenda",
            grid_tab: "Grid",
            drag_to_create: "Kéo để tạo",
            drag_to_move: "Kéo để di chuyển",
            message_ok: "OK",
            message_cancel: "Hủy",
            next: "Tiếp",
            prev: "Quay Lại",
            year: "Năm",
            month: "Tháng",
            day: "Ngày",
            hour: "Giờ",
            minute: "Phút",
            repeat_radio_day: "Hàng ngày",
            repeat_radio_week: "Hàng tuần",
            repeat_radio_month: "Hàng tháng",
            repeat_radio_year: "Hàng năm",
            repeat_radio_day_type: "Mọi",
            repeat_text_day_count: "day",
            repeat_radio_day_type2: "Mỗi ngày làm việc",
            repeat_week: "Lặp lại mỗi ngày",
            repeat_text_week_count: "tuần tới:",
            repeat_radio_month_type: "Lặp lại",
            repeat_radio_month_start: "Bật",
            repeat_text_month_day: "On",
            repeat_text_month_count: "місяць",
            repeat_text_month_count2_before: "кожен ",
            repeat_text_month_count2_after: "місяць",
            repeat_year_label: "",
            select_year_day2: "",
            repeat_text_year_day: "day",
            select_year_month: "",
            repeat_radio_end: "end",
            repeat_text_occurences_count: "lần xuất hiện",
            repeat_radio_end3: "Kết thúc bởi",
            repeat_radio_end2: "",
            month_for_recurring: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
            day_for_recurring: ["Chủ nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy "]
        }
    }
});