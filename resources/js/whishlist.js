import "../css/whishlist.css";
import "../css/toastr.min.css";


function addWishlist() {
    toastr.success('Added to whishlist!');
    
}
function removeWishlist() {
    toastr.warning('Removed from whishlist!');
}
var whishlistBtn = document.querySelector(".whishlist_btn");
whishlistBtn.addEventListener('click', function(){
    if(this.classList.contains('active')){
        removeWishlist()
        this.classList.remove('active')
    }else{
        this.classList.add('active')
        addWishlist();
    }
    
})