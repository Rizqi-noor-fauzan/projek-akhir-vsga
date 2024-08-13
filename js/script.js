let checkBoxPenginapan = document.getElementById("cb_penginapan");
let checkBoxTransport = document.getElementById("cb_transportasi");
let checkBoxMakan = document.getElementById("cb_makan");
let totalDays = document.getElementById("jumlah_hari");
let totalPeserta = document.getElementById("jumlahPeserta");
let totalHarga = document.getElementById("total_harga");
let totalTagihan = document.getElementById("total_tagihan");

totalDays.addEventListener("change", function () {
  let harga = Number(totalHarga.value);
  let tagihan = harga * Number(totalDays.value) * Number(totalPeserta.value);
  totalTagihan.value = tagihan;
});

totalPeserta.addEventListener("change", function () {
  let harga = Number(totalHarga.value);
  let tagihan = harga * Number(totalDays.value) * Number(totalPeserta.value);
  totalTagihan.value = tagihan;
});

checkBoxPenginapan.addEventListener("change", function () {
  let harga = Number(totalHarga.value);
  if (this.checked) {
    harga = harga + 1000000;
  } else {
    harga = harga - 1000000;
  }
  totalHarga.value = harga;

  let tagihan = harga * Number(totalDays.value) * Number(totalPeserta.value);
  totalTagihan.value = tagihan;
});

checkBoxTransport.addEventListener("change", function () {
  let harga = Number(totalHarga.value);
  if (this.checked) {
    harga = harga + 1200000;
  } else {
    harga = harga - 1200000;
  }
  totalHarga.value = harga;

  let tagihan = harga * Number(totalDays.value) * Number(totalPeserta.value);
  totalTagihan.value = tagihan;
});

checkBoxMakan.addEventListener("change", function () {
  let harga = Number(totalHarga.value);
  if (this.checked) {
    harga = harga + 700000;
  } else {
    harga = harga - 700000;
  }

  totalHarga.value = harga;

  let tagihan = harga * Number(totalDays.value) * Number(totalPeserta.value);
  totalTagihan.value = tagihan;
});
