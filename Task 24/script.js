
document.addEventListener('DOMContentLoaded', function(){
    const modal = document.getElementById('modal');
    const modalBody = document.getElementById('modal-body');
    const closeBtn = document.getElementById('modal-close');

    function openModal(html){
        modalBody.innerHTML = html;
        modal.setAttribute('aria-hidden', 'false');
    }
    function closeModal(){
        modal.setAttribute('aria-hidden', 'true');
        modalBody.innerHTML = '';
    }

    document.querySelectorAll('.card, .btn-view').forEach(el => {
        el.addEventListener('click', function(e){
            const id = this.dataset.id || e.currentTarget.dataset.id;
            if (!id) return;
          
            fetch('product_detail.php?id=' + encodeURIComponent(id))
                .then(r => r.json())
                .then(data => {
                    if (data.error){
                        openModal('<p>Error: ' + data.error + '</p>');
                        return;
                    }
                    const p = data.product;
                    let html = '';
                    if (p.image_url){
                        html += '<img class="product-image" src="' + p.image_url + '" alt="' + escapeHtml(p.name) + '">';
                    }
                    html += '<h2 class="product-name">' + escapeHtml(p.name) + '</h2>';
                    html += '<div class="product-price">Rp ' + numberWithCommas(p.price) + '</div>';
                    html += '<p class="product-desc">' + (p.long_desc ? escapeHtml(p.long_desc) : escapeHtml(p.short_desc)) + '</p>';
                    openModal(html);
                })
                .catch(err => {
                    openModal('<p>Gagal mengambil data produk.</p>');
                    console.error(err);
                });
        });
    });

    closeBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', function(e){
        if (e.target === modal) closeModal();
    });

    function numberWithCommas(x){
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }
    function escapeHtml(text){
        if (!text) return '';
        return text.replace(/[&<>"']/g, function(m){ return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]; });
    }
});
