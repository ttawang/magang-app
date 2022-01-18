/* BUATANKU */

//input pada text menjadi angka
function number_only(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

// pencarian pada select tanpa modal
$('.select-cari').select2({
	theme: 'bootstrap4'
});

// pencarian pada select dengan modal
$('.select-cari-modal').select2({
	theme: 'bootstrap4',
	dropdownParent : $('.modal'),
});

function formattanggal (input) {
    var datePart = input.match(/\d+/g),
    // year = datePart[0].substring(4), // get only two digits
    year = datePart[0],
    month = datePart[1], day = datePart[2];

    return day+'/'+month+'/'+year;
}
    //Date picker
$(function () {
    $('.datepick').datetimepicker({
        format: 'DD/MM/YYYY',
        defaultDate: moment().format(),
    });
});

function now_date(){
    var dt = new Date();
    var date =("0" + dt.getDate()).slice(-2) +"/"+ ("0" + (dt.getMonth() + 1)).slice(-2) +"/"+ dt.getFullYear();

    return date;
};
function text_date(string) {
	bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];

    tanggal = string.split("-")[2];
    bulan = string.split("-")[1];
    tahun = string.split("-")[0];

    return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
}
