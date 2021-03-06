function proccessPayment(token)
{
    let data = {
        card_token: token,
        hash: PagSeguroDirectPayment.getSenderHash(),
        installment: document.querySelector('.select_installments').value,
        card_name: document.querySelector('input[name=card_name]').value,
        _token: csrf
    }
    $.ajax({
        type: 'POST',
        url: urlProccess,
        data: data,
        dataType: 'json',
        success: function (res){
            setInterval(()=>{
                toastr.success(res.data.message, 'Sucesso');
            },4000)
            window.location.href = `${urlThanks}?order=${res.data.order}`;
        }
    });
}

function getInstallments(amount, brand) {
    PagSeguroDirectPayment.getInstallments({
        amount: amount,
        brand: brand,
        maxInstallmentNoInterest: 0,
        success: function (res){
            let selectInstallments = drawSelectInstallments(res.installments[brand]);
            document.querySelector('div.installments'). innerHTML = selectInstallments;
            console.log(res);
        },
        error: function (err){
            console.log(err);
        },
        complete: function (res){

        }
    })
}

function drawSelectInstallments(installments) {
    let select = '<label>Opções de Parcelamento:</label>';

    select += '<select class="form-control select_installments">';

    for(let l of installments) {
        select += `<option value="${l.quantity}|${l.installmentAmount}">${l.quantity}x de ${l.installmentAmount} - Total: ${l.totalAmount}</option>`;
    }

    select += '</select>';

    return select;
}
