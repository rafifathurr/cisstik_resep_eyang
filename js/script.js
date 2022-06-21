function search(ele) {
    if(event.key === 'Enter') { 
        // buat object AJAX
        var xhr = new XMLHttpRequest();

        // cek AJAX
        xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
            }
        };

        // eksekusi AJAX
        xhr.open('GET','ajax/process.php?resi=' + ele.value,true);
        xhr.send();    
    }
}