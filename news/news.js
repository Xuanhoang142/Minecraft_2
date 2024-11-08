$(document).ready(function(){

    //doi mau button duoc click
    $('.menu button').click(function(){
        //loai bo lop active khoi cac nut
        $('.menu button').removeClass('active')
        //them lop active vao nut duoc chon
        $(this).addClass('active')
    });
});