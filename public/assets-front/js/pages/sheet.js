$(document).ready(function () {
    One.loader('show');
    if (localStorage.getItem("data")) {
        var loc_data = JSON.parse(localStorage.getItem("data"));
        $('.data').html(loc_data.data.html);
        $('#jml_soal').val(loc_data.data.number);
        $('#begin_time').val(loc_data.begin_time);
        for (const [key, value] of Object.entries(loc_data.jawaban)) {
            for (var p = 1; p < loc_data.data.number; p++) {
                if (key === "answer[" + p + "][answer]") {
                    $("input[name='" + key + "'][value='" + value + "']").prop('checked', true);
                }
                if (key === "answer[" + p + "][notsure]") {
                    if(value === "Y"){
                        $("input[name='" + key + "']").val(value);
                    }
                }
            }
        }
        var counter = new Date(loc_data.duration);
        buka(1);
        simpan_sementara();
        countdown(counter);
        widget = $(".step");
        total_widget = widget.length;
        widget = $(".step");
        btnnext = $(".next");
        btnback = $(".back");
        btnsubmit = $(".submit");
        $(".step, .back ").hide();
        $("#widget_1").show();
    } else {
        $.ajax({
            url: url,
            type: "POST",
            data: {
                id: id_tes
            },
            success: function (d) {
                var d = JSON.parse(d);
                $('.data').html(d.html);
                var counter = new Date();
                counter.setTime(counter.getTime() + durasi*60*1000)
                var data = {
                    'data': d,
                    'duration' : counter,
                    'begin_time' : Math.floor(Date.now()/1000),
                    'jawaban': getFormData($("#ujian")),
                };
                localStorage.setItem("data", JSON.stringify(data));

                $('#jml_soal').val(d.number);
                $('#begin_time').val(Math.floor(Date.now()/1000));
                buka(1);
                simpan_sementara();
                countdown(counter);
                widget = $(".step");
                total_widget = widget.length;
                widget = $(".step");
                btnnext = $(".next");
                btnback = $(".back");
                btnsubmit = $(".submit");

                $(".step, .back").hide();
                $("#widget_1").show();
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    setTimeout(function () {
        One.loader('hide');
    }, 3000)
});

// function countdown(minutes, seconds) {
//     function tick() {
//         var counter = document.getElementById("timer");

//         if (localStorage.getItem("counter")) {
//             minutes = JSON.parse(localStorage.getItem("counter")).min;
//             seconds = JSON.parse(localStorage.getItem("counter")).sec;
//         }

//         counter.innerHTML =
//             minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
//         seconds--;

//         if (seconds >= 0) {
//             timeoutHandle = setTimeout(tick, 1000);
//             var con = {
//                 'min': minutes,
//                 'sec': seconds,
//             };
//             localStorage.setItem("counter", JSON.stringify(con));
//         } else {
//             if (minutes >= 1) {
//                 // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
//                 setTimeout(function () {
//                     countdown(minutes - 1, 59);
//                     var con = {
//                         'min': minutes - 1,
//                         'sec': 59,
//                     };
//                     localStorage.setItem("counter", JSON.stringify(con));
//                 }, 1000);
//             } else {
//                 localStorage.removeItem("counter");
//                 alert('entek');
//             }
//         }
//     }
//     tick();
// }

function getFormData($form) {
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};
    $.map(unindexed_array, function (n, i) {
        indexed_array[n['name']] = n['value'];
    });
    return indexed_array;
}

function buka(id_widget) {

    $(".next").attr('rel', (id_widget + 1));
    $(".back").attr('rel', (id_widget - 1));
    $(".ragu_ragu").attr('rel', (id_widget));
    var back = $(".back").attr('rel');
    cek_status_ragu(id_widget);
    cek_terakhir(id_widget);

    $("#soalke").html(id_widget);

    $(".step").hide();
    var sudah_awal = back == 0 ? 1 : 0;
    if (sudah_awal == 1) {
        $(".back").hide();
        $(".next").show();
    } else if (sudah_awal == 0) {
        $(".next").show();
        $(".back").show();
    }
    $("#widget_" + id_widget).show();
    // simpan();
}



function next() {

    var berikutnya = $(".next").attr('rel');
    berikutnya = parseInt(berikutnya);
    berikutnya = berikutnya > total_widget ? total_widget : berikutnya;

    $("#soalke").html(berikutnya);

    $(".next").attr('rel', (berikutnya + 1));
    $(".back").attr('rel', (berikutnya - 1));
    $(".ragu_ragu").attr('rel', (berikutnya));
    cek_status_ragu(berikutnya);
    cek_terakhir(berikutnya);

    var sudah_akhir = berikutnya == total_widget ? 1 : 0;

    $(".step").hide();
    $("#widget_" + berikutnya).show();

    if (sudah_akhir == 1) {
        $(".back").show();
        $(".next").hide();
    } else if (sudah_akhir == 0) {
        $(".next").show();
        $(".back").show();
    }
    simpan();
}

function back() {
    var back = $(".back").attr('rel');
    back = parseInt(back);
    back = back < 1 ? 1 : back;

    $("#soalke").html(back);

    $(".back").attr('rel', (back - 1));
    $(".next").attr('rel', (back + 1));
    $(".ragu_ragu").attr('rel', (back));
    cek_status_ragu(back);
    cek_terakhir(back);

    $(".step").hide();
    $("#widget_" + back).show();

    var sudah_awal = back == 1 ? 1 : 0;

    $(".step").hide();
    $("#widget_" + back).show();

    if (sudah_awal == 1) {
        $(".back").show();
        $(".next").show();
    } else if (sudah_awal == 0) {
        $(".next").show();
        $(".back").show();
    }

    simpan();
}

function tidak_jawab() {
    var id_step = $(".ragu_ragu").attr('rel');
    var status_ragu = $("#rg_" + id_step).val();

    if (status_ragu == "N") {
        $("#rg_" + id_step).val('Y');
        $("#btn_soal_" + id_step).removeClass('btn-success');
        $("#btn_soal_" + id_step).addClass('btn-warning');

    } else {
        $("#rg_" + id_step).val('N');
        $("#btn_soal_" + id_step).removeClass('btn-warning');
        $("#btn_soal_" + id_step).addClass('btn-success');
    }

    cek_status_ragu(id_step);

    simpan();
}

function cek_status_ragu(id_soal) {
    var status_ragu = $("#rg_" + id_soal).val();

    if (status_ragu == "N") {
        $(".ragu_ragu").html('Ragu - ragu');
    } else {
        $(".ragu_ragu").html('Tidak Ragu');
    }
}

function cek_terakhir(id_soal) {
    // var jml_soal = $("#jml_soal").val();
    // jml_soal = (parseInt(jml_soal) - 1);

    // if (jml_soal === id_soal) {
    //     $('.next').hide();
    //     $(".selesai, .back").show();
    // } else {
    //     $('.next').show();
    //     $(".selesai").hide();
    // }
}

function simpan_sementara() {
    var f_asal = $("#ujian");
    var form = getFormData(f_asal);
    // form = JSON.stringify(form);
    var jml_soal = form.jml_soal;
    jml_soal = parseInt(jml_soal);
    var hasil_jawaban = "";

    for (var i = 1; i < jml_soal; i++) {
        var idx = 'answer[' + i + '][answer]';
        var idx2 = 'answer[' + i + '][notsure]';
        var jawab = form[idx];
        var ragu = form[idx2];
        var opsi = $("input[name='" + idx + "']:checked").data('opsi');
        if (jawab != undefined) {
            if (ragu == "Y") {
                if (jawab == "-") {
                    hasil_jawaban += '<div class="col-4 col-lg-4 text-center py-0 px-1"><a id="btn_soal_' + (i) + '" class="btn btn-sm btn-block bg-city text-white d-flex flex-wrap justify-content-center align-items-center fs-sm" onclick="return buka(' + (i) + ');">' + (i) + ". " + opsi + "</a></div>";
                } else {
                    hasil_jawaban += '<div class="col-4 col-lg-4 text-center py-0 px-2"><a id="btn_soal_' + (i) + '" class="btn btn-sm btn-block bg-city text-white d-flex flex-wrap justify-content-center align-items-center fs-sm" onclick="return buka(' + (i) + ');">' + (i) + ". " + opsi + "</a></div>";
                }
            } else {
                if (jawab == "-") {
                    hasil_jawaban += '<div class="col-4 col-lg-4 text-center py-0 px-1"><a id="btn_soal_' + (i) + '" class="btn btn-sm btn-block bg-dark text-white d-flex flex-wrap justify-content-center align-items-center fs-sm" onclick="return buka(' + (i) + ');">' + (i) + ". " + opsi + "</a></div>";
                } else {
                    hasil_jawaban += '<div class="col-4 col-lg-4 text-center py-0 px-1"><a id="btn_soal_' + (i) + '" class="btn btn-sm btn-block bg-dark text-white d-flex flex-wrap justify-content-center align-items-center fs-sm" onclick="return buka(' + (i) + ');">' + (i) + ". " + opsi + "</a></div>";
                }
            }
        } else {
            hasil_jawaban += '<div class="col-4 col-lg-4 text-center py-0 px-1"><a id="btn_soal_' + (i) + '" class="btn btn-sm btn-block bg-success text-white d-flex flex-wrap justify-content-center align-items-center fs-sm" onclick="return buka(' + (i) + ');">' + (i) + ". -</a></div>";
        }
    }
    $("#tampil_jawaban").html(hasil_jawaban);
}

function simpan() {
    simpan_sementara();
    var form = getFormData($("#ujian"));
    var data1 = JSON.parse(localStorage.data);
    data1.jawaban = getFormData($("#ujian"));
    localStorage.setItem("data", JSON.stringify(data1));
}

function selesai() {
    localStorage.clear();
    var form = $("#ujian");
    form.submit();
    // simpan();
    // ajaxcsrf();
    // $.ajax({
    //     type: "POST",
    //     url: base_url + "ujian/simpan_akhir",
    //     data: {
    //         id: id_tes
    //     },
    //     beforeSend: function () {
    //         simpan();
    //         // $('.ajax-loading').show();    
    //     },
    //     success: function (r) {
    //         console.log(r);
    //         if (r.status) {
    //             window.location.href = base_url + 'ujian/list';
    //         }
    //     }
    // });
}

function waktuHabis() {
    setTimeout(function () {
        selesai();
    }, 1000)
}

function simpan_akhir() {
    simpan();
    Swal.fire({
        title: 'Yakin Ingin Mengakhiri Tes Ini?',
        text: 'Jawaban tidak dapat diubah setelah "Selesai"',
        icon: 'info',
        showCloseButton: true,
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Selesai',
        confirmButtonColor: "#6fa306",
        customClass: {
            cancelButton: 'order-1',
            confirmButton: 'order-2',
        }
    }).then((result) => {
        if (result.value) {
            setTimeout(function () {
                Swal.fire({
                    showCloseButton: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: 'col-5 col-md-3',
                    imageUrl: 'https://udindym.site/loader-c.gif',
                    text: 'Silahkan Tunggu...',
                })
            }, 20000)

                selesai();

            Swal.Close();
        }
    });
}



function countdown(time) {
    console.log(time)
    var n = new Date();
    var x = setInterval(function() {
        var now = new Date().getTime();
        var dis = time.getTime() - now;
        var d = Math.floor(dis / (1000 * 60 * 60 * 24));
        var h = Math.floor((dis % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var m = Math.floor((dis % (1000 * 60 * 60)) / (1000 * 60));
        var s = Math.floor((dis % (1000 * 60)) / (1000));
        d = ("0" + d).slice(-2);
        h = ("0" + h).slice(-2);
        m = ("0" + m).slice(-2);
        s = ("0" + s).slice(-2);
        var cd =h + " : " + m + " : " + s;
        $('#timer').html(cd);
        setTimeout(function() {
            waktuHabis();
        }, dis);
    }, 1000);
}