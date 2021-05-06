document.getElementById("btn-search").addEventListener("click", searchByName);

let valueNama = null;

function searchByName() {
    valueNama = document.getElementById("namesearch").value.toLowerCase();
    search();
}

function search() {
    var listBarang = document.getElementById("listBarang");
    var listBarangToList = listBarang.getElementsByClassName("list");
    var lengthList = listBarangToList.length;
    // console.log(listBarangToList);
    for (var i = 0; i < lengthList; i++) {
        var card = listBarangToList[i].getElementsByClassName("card")[0];
        var cardBody = card.getElementsByClassName("card-body")[0];
        var nama = cardBody
            .getElementsByClassName("nama")[0]
            .innerText.toLowerCase();
        // console.log(nama);
        // console.log(valueNama);
        // var InList = [nama];
        // var InForm = [valueNama];
        // var x = 0;
        // if (InList[0].indexOf(InForm[0]) === -1 && InForm[0] !== null) {
        //     listBarangToList[0].style.display = "none";
        //     break;
        // } else {
        //     listBarangToList[0].style.display = "block";
        // }

        if (nama.indexOf(valueNama) === -1) {
            listBarangToList[i].style.display = "none";
            // console.log(listBarangToList[i]);
            // break;
        } else {
            listBarangToList[i].style.display = "block";
        }

        // break;
        // for (let j = 0; j < nama.length; j++) {
        //     const element = nama[j];
        // }
    }
}

// document.getElementById("reset").addEventListener("click", reset);
