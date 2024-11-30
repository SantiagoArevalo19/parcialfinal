document.getElementById('discountForm').addEventListener('submit', function (e) {
    e.preventDefault();

    //para el formulario
    const productName = document.getElementById('productName').value.trim();
    const category = document.getElementById('category').value;
    const unitPrice = parseFloat(document.getElementById('unitPrice').value);
    const units = parseInt(document.getElementById('units').value);

    if (!productName || isNaN(unitPrice) || isNaN(units) || unitPrice <= 0 || units <= 0) {
        alert('Por favor, ingresa valores válidos para todos los campos.');
        return;
    }

   //para calcular el preciooo xd
    const totalPrice = unitPrice * units;

    let discountPercentage = 0;

    if (category === 'A') {
        if (units >= 1 && units <= 10) discountPercentage = 1;
        else if (units >= 11 && units <= 20) discountPercentage = 1.5;
        else if (units > 20) discountPercentage = 2;
    } else if (category === 'B') {
        if (units >= 1 && units <= 10) discountPercentage = 1.2;
        else if (units >= 11 && units <= 20) discountPercentage = 2;
        else if (units > 20) discountPercentage = 3;
    } else if (category === 'C') {
        if (units >= 11 && units <= 20) discountPercentage = 0.5;
        else if (units > 20) discountPercentage = 1;
    }

    
    const discountValue = (totalPrice * discountPercentage) / 100;
    const totalWithDiscount = totalPrice - discountValue;


    const resultContainer = document.createElement('div');
    resultContainer.className = `result ${category}`;

    resultContainer.innerHTML = `
        <p><strong>Nombre del producto:</strong> ${productName}</p>
        <p><strong>Categoría:</strong> ${category}</p>
        <p><strong>Unidades:</strong> ${units}</p>
        <p><strong>Precio unitario:</strong> $${unitPrice.toFixed(2)}</p>
        <p><strong>Precio total:</strong> $${totalPrice.toFixed(2)}</p>
        <p><strong>Descuento:</strong> ${discountPercentage}%</p>
        <p><strong>Valor del descuento:</strong> $${discountValue.toFixed(2)}</p>
        <p><strong>Total a pagar:</strong> $${totalWithDiscount.toFixed(2)}</p>
    `;

    
    const previousResult = document.querySelector('.result');
    if (previousResult) {
        previousResult.remove();
    }

    document.body.appendChild(resultContainer);
});
