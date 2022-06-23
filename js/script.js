
function filter() {

        var status = document.getElementById("status");
        var date = document.getElementById("filterdate");
        var id = document.getElementById("id");
        var container = document.getElementById('container');
       
        var stat = status.value;
        var id = id.value;


        // buat object AJAX
        var xhr = new XMLHttpRequest();
        var xhr2 = new XMLHttpRequest();

        // cek AJAX
        xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
            }
        };

        xhr2.onreadystatechange = function(){
            if(xhr2.readyState == 4 && xhr2.status == 200){
                container.innerHTML = xhr2.responseText;
                }
            };

        // eksekusi AJAX
        xhr.open('GET','order.php?status=' + stat + '&id=' + id , true);
        xhr.send(); 
}
