// hide 'filtros' before taxonomies

const taxonomies = document.querySelectorAll('.taxonomies');

taxonomies.forEach(item => {
    
    const wpDefaultText = item.innerHTML.split('');
    
    const cleanText = wpDefaultText.filter((value, index) => {
        return index > 8;
    }).join('');
    
    item.innerHTML = cleanText;

});

