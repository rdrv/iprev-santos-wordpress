// fix edit btn show on hover and focus input

const removeEditBtn = event => {

    const input = document.querySelector('.pesquisa-home-input');

    input.addEventListener(event, function() {
        document.querySelector('.is-link-container').style.display = 'none';
    });

};

removeEditBtn('focus');
removeEditBtn('mouseover');