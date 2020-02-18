function renderAllGoods ()
{
    var str = "getAllGoods=" + '1';
    $.ajax({
        url: '../controllers/Admin.php', // путь к php-обработчику
        type: 'POST', // метод передачи данных
        dataType: 'json', // тип ожидаемых данных в ответе
        data: str, // данные, которые передаем на сервер
        error: function (req, text, error) { // отслеживание ошибок во время выполнения ajax-запроса
            alert('Хьюстон, У нас проблемы! ' + text + ' | ' + error);
        },
        success: function (dateAnswer) {
            console.log(dateAnswer);
            var table = '<table class="table table-hover"><thead><tr><th scope="col">Наименование</th><th scope="col">Количество</th><th scope="col">Сумма</th></tr></thead><tbody >';
            var i = 0;
            for ( var key in dateAnswer) {
                table += '<tr class="rowGoods' + dateAnswer[key].id + '">';
                table += '<th>' + dateAnswer[key].nameFull + '</th>';
                table += '<td><i class="fas fa-plus addToBasket" onclick="addToBasket(' + dateAnswer[key].id + ')" data-id=' + dateAnswer[key].id + '></i>';
                table += '<div class="basketOneCount' + dateAnswer[key].id + '">' + dateAnswer[key].count + '</div>';
                table += '<i class="fas fa-minus deleteToBasket" onclick="deleteToBasket(' + dateAnswer[key].id + ')" data-id=' + dateAnswer[key].id + '></i></td>';
                table += '<td><div class="basketOneSum' + dateAnswer[key].id + '">' + dateAnswer[key].count * dateAnswer[key].price + '</div></td></tr>';
                i++;
            }
            table += $('</table>');
            var modal = $('.modal-body');
            $('.modal-body').empty();
            modal.append(table);
        }
    });
};


function renderBasketModal ()
{
    $.ajax ( {
        url: 'c/Basket.php',
        type: 'POST',
        dataType: 'json',
        data: { getBasketGoods: '1' }, 
        error: function ( req, text, error )
        {
            alert ( 'Хьюстон, У нас проблемы!\n' + text + ' | ' + error );
        },
        success: function ( dateAnswer ) 
        {
			var sumGood = 0;
            var table = '<table class="table table-hover"><thead><tr><th scope="col">Наименование</th><th scope="col">Количество</th><th scope="col">Сумма</th></tr></thead><tbody >';
            for ( var key in dateAnswer )
            {
				sumGood += dateAnswer [key].count * dateAnswer [key].price;
                table += '<tr class="rowGoods' + dateAnswer [key].id + '">';
                table += '<th>' + dateAnswer [key].nameFull + '</th>';
                table += '<td><div class="countModal"><div class="simbolModal"><i class="fas fa-plus" onclick="addToBasket(' + dateAnswer [key].id + ', true )" data-id=' + dateAnswer [key].id + '></i></div>';
                table += '<div class="basketOneCount' + dateAnswer [key].id + '">' + dateAnswer [key].count + '</div>';
                table += '<div class="simbolModal"><i class="fas fa-minus" onclick="deleteFromBasket(' + dateAnswer [key].id + ', true )" data-id=' + dateAnswer [key].id + '></i></div></div></td>';
                table += '<td><div class="basketOneSum' + dateAnswer [key].id + '">' + dateAnswer [key].count * dateAnswer [key].price + '</div></td></tr>';
            };
			table += '<tr class="">';
            table += '<td></td><th>Сумма заказа</th>';
            table += '<td><div class="bascketTotalSum">' + sumGood + '</div></td></tr>';
            table += ( '</table>' );
            var modal = $( '.modal-body' );
            modal.empty ();
            modal.append ( table );
        }
    });
};

function addToBasket ( idGood, modal )
{
    $.ajax ( {
        url: 'c/Basket.php',
        type: 'POST',
        dataType: 'json',
        data: { addToBasketId: idGood },
        error: function ( req, text, error )
        {
            alert ( 'Хьюстон, У нас проблемы!\n' + text + ' | ' + error );
        },
        success: function ( dateAnswer )
        {
            if ( dateAnswer )
            {
                $( '.basketInfoOut' ).html ( '<strong>Корзина</strong>' + '<br>' + '<strong>' + dateAnswer [0] + '</strong>' );
                $( '.basketOneCount' + idGood ).html ( dateAnswer [2] );
                $( '.basketOneSum' + idGood ).html ( dateAnswer [3] );
				$( '.bascketTotalSum' ).html ( dateAnswer [4] );
            }
            if ( modal )
                renderBasketModal ();
            else
                renderBasket ();
        }
    });
};

function deleteFromBasket ( idGood, modal )
{
    $.ajax ( {
        url: 'c/Basket.php',
        type: 'POST',
        dataType: 'json',
        data: { deleteFromBasketId: idGood },
        error: function ( req, text, error ) 
        {
            alert('Хьюстон, У нас проблемы!\n' + text + ' | ' + error);
        },
        success: function ( dateAnswer )
        {
            if ( dateAnswer [2] > 0 )
            {
                $( '.basketInfoOut' ).html ( '<strong>Корзина</strong>' + '<br>' + '<strong>' + dateAnswer [0] + '</strong>' );
                $( '.basketOneCount' + idGood ).html ( dateAnswer [2] );
                $( '.basketOneSum' + idGood ).html ( dateAnswer [3] );
                $( '.bascketTotalSum' ).html ( dateAnswer [4] );
            } 
            else if ( dateAnswer [0] == null ) 
            {
                console.log ( dateAnswer [0] );
                $( '.basketInfoOut' ).html ( '<strong>Корзина</strong>' + '<br>' + '<strong>товаров нет ( </strong>' );
            }
            if ( modal )
                renderBasketModal ();
            else
                renderBasket ();
        }
    } );
};


function renderBasket ()
{
    $.ajax ( {
        url: 'c/Basket.php',
        type: 'POST',
        dataType: 'json',
        data: { renderBasket: '1' }, 
        error: function ( req, text, error )
        {
            alert ( 'Хьюстон, У нас проблемы!\n' + text + ' | ' + error );
        },
        success: function ( dateAnswer ) 
        {
	        var sumGood = 0;
			var sumGoodDiscount = 0;
			var happyHours;
			var delivery;
			var dateAnswerBasket = dateAnswer;
            for ( var key in dateAnswerBasket )
            {
				sumGood += dateAnswerBasket [key].count * dateAnswerBasket [key].price;
    			sumGoodDiscount += dateAnswerBasket[key].count * dateAnswerBasket[key].price * (( 100 - dateAnswerBasket [key].discount ) / 100 );
            };
				
			var date = new Date ();
		    var hours = date.getHours ();
		    var minutes = "0" + date.getMinutes ();
		    var formattedTime = hours + ':' + minutes.substr ( -2 );
			
		    if ( hours >= 0 && hours <= 7 )
				happyHours = sumGoodDiscount * 7 / 100;
			else
				happyHours = 0;
            
            if ( $( "#delivery" ).val () == "0" )
                delivery = 0;
            else
                delivery = sumGoodDiscount * 10 / 100;
			   
			var totalCoast = Math.floor ( sumGoodDiscount - happyHours - delivery );
            var table = '<table class="table table-hover table-bordered"><thead><tr><th scope="col">Наименование</th><th scope="col">Количество</th><th scope="col">Цена</th><th scope="col">Сумма</th><th scope="col">Скидка</th><th scope="col">Сумма c учетом скидки</th></tr></thead><tbody >';
            for ( var key in dateAnswerBasket )
            {
                table += '<tr class="rowGoods' + dateAnswerBasket [key].id + '">';
                table += '<td>' + dateAnswerBasket [key].nameFull + '</td>';
				table += '<td><div class="countModal"><div class="simbolModal"><i class="fas fa-plus" onclick="addToBasket(' + dateAnswerBasket [key].id + ', false )" data-id=' + dateAnswerBasket [key].id + '></i></div>';
                table += '<div class="basketOneCount' + dateAnswerBasket [key].id + '">' + dateAnswerBasket [key].count + '</div>';
                table += '<div class="simbolModal"><i class="fas fa-minus" onclick="deleteFromBasket(' + dateAnswerBasket [key].id + ', false )" data-id=' + dateAnswerBasket [key].id + '></i></div></div></td>';
                table += '<td>' + dateAnswerBasket [key].price + '</td>';
                table += '<td>' + dateAnswerBasket [key].count * dateAnswerBasket [key].price + '</td>';
				table += '<td>' + dateAnswerBasket [key].discount + ' %</td>';
				
				var goodDiscount = dateAnswerBasket [key].count * dateAnswerBasket [key].price * (( 100 - dateAnswerBasket [key].discount ) / 100 );
                table += '<td>' + Math.floor(goodDiscount) + '</td></tr>';
            };
						
			table += '<tr><th>Итого</th><th>-</th><th>-</th>';
            table += '<th>' + Math.floor ( sumGood ) + '</th><th>-</th>';
            table += '<th>' + Math.floor ( sumGoodDiscount ) + '</th></tr>';
            table += '<tr><th colspan="5">Скидка "Счастливый час (-7% за заказ с 00:00 до 08:00)"</th>';
			table += '<th>-' + Math.floor ( happyHours ) + '</th></tr>';
            table += '<tr><th colspan="5">Скидка за самовывоз (10%)</th>';
            if ( delivery == 0 )
                table += '<th>0</th></tr>';
            else
                table += '<th>-' + Math.floor ( delivery ) + '</th></tr>';
            table += '<tr><th colspan="5">Сумма к оплате</th>';
            table += '<th>' + totalCoast + '</th></tr>';
            table += ('</table>');
            
            $( '#payAmount').val ( totalCoast );
            
            var modal = $( '.orderModalBody' );
            modal.empty ();
            modal.append ( table );
            var orderTable = $( '.orderTable' );
            orderTable.empty ();
			if ( dateAnswerBasket.length == 0 )
				$( orderTable ).text ( 'В корзине пусто!' );
			else
                orderTable.append ( table );
        }
    });
};

function sendOrder () 
{
	var formData = $( '.formOrder' ).serialize();
    $.ajax({
        url: 'c/Basket.php',
        type: 'POST',
        dataType: 'json',
        data: formData,
        error: function ( req, text, error )
        {
            alert ( 'Хьюстон, У нас проблемы! ' + text + ' | ' + error );
        },
        success: function ( dateAnswer )
        {
			$( location ).attr ( 'href','index.php?c=order&act=end' );
        }
    });
};

function renderManager ()
{
    $.ajax ({
        url: 'c/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: { renderManager: 1 },
        error: function ( req, text, error )
        {
            alert ( 'Хьюстон, У нас проблемы! ' + text + ' | ' + error );
        },
        success: function ( dateAnswer )
        {
            var table = '<table class="table table-hover table-bordered"><thead><tr><th scope="col">#</th><th scope="col">Заказ</th><th scope="col">Сумма к оплате</th><th scope="col">Время заказа</th><th scope="col">Сдача с купюры</th><th scope="col">Способ оплаты</th><th scope="col">Доставка/самовывоз</th><th scope="col">Заказ на время</th><th scope="col">Телефон</th><th scope="col">Дисконтная карта</th><th scope="col">Персон</th><th scope="col">Адрес</th><th scope="col">Комментарий</th></tr></thead><tbody>';

            for ( var order in dateAnswer )
            {
                table += '<tr><th scope="row">' + dateAnswer [order].id + '</th>';
                table += '<td><button type="button" onclick="renderManagerModalOrder(' + dateAnswer [order].id + ')" class="btn btn-primary" data-toggle="modal" data-target="#orderModal">Детали заказа</button></td>';
                table += '<td>' + dateAnswer [order].payAmount + '</td>';

                var date = new Date ( dateAnswer [order].timeOrder * 1000 );
                var hours = date.getHours ();
                var minutes = "0" + date.getMinutes ();
                var formattedTime = hours + ':' + minutes.substr ( -2 );
                table += '<td>' + formattedTime + '</td>';

                table += '<td>' + dateAnswer [order].money + '</td>';
                if ( dateAnswer [order].pay == 1 )
                    table += '<td>Безнал</td>';
                else
                    table += '<td>Нал</td>';
                if ( dateAnswer [order].delivery == 0 )
                    table += '<td>Доставка</td>';
                else
                    table += '<td>Самовывоз</td>';
                table += '<td>' +  dateAnswer [order].desiredTime + '</td>';
                table += '<td>' + dateAnswer [order].phone+'</td>';
                table += '<td>' + dateAnswer [order].discountCard+'</td>';
                table += '<td>' + dateAnswer [order].persons+'</td>';
                table += '<td>' + dateAnswer [order].address+'</td>';
            }
            table += '<tbody></table>';
            var mainTableManager = $( '.mainTableManager' );
            mainTableManager.empty ();
            mainTableManager.append ( table );
        }
    });
};

function renderManagerModalOrder ( orderId )
{
    $.ajax ({
        url: 'c/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: { renderOrderToManager: orderId },
        error: function ( req, text, error )
        {
            alert ( 'Хьюстон, У нас проблемы! ' + text + ' | ' + error );
        },
        success: function ( dateAnswer )
        {
			var sumGood = 0;
			var sumGoodDiscount = 0;
			var happyHours;
			var delivery;
            for ( var key in dateAnswer )
            {
				sumGood += dateAnswer [key].count * dateAnswer [key].price;
    			sumGoodDiscount += dateAnswer [key].count * dateAnswer [key].price * (( 100 - dateAnswer [key].discount ) / 100 );
            };
						
			var date = new Date ( dateAnswer [0].timeOrder * 1000 );
			var hours = date.getHours ();
			var minutes = "0" + date.getMinutes ();
			var formattedTime = hours + ':' + minutes.substr ( -2 );
			
            if ( hours >= 0 && hours <= 7 )
				happyHours = sumGoodDiscount * 7 / 100;
			else
				happyHours = 0;
			
			if ( dateAnswer [key].delivery == 0 )
				delivery = 0;
			else
				delivery = sumGoodDiscount * 10 / 100;
		   
     	    var totalCoast = Math.floor ( sumGoodDiscount - happyHours - delivery );
			   
            var table = '<table class="table table-hover table-bordered"><thead><tr><th scope="col">Наименование</th><th scope="col">Количество</th><th scope="col">Цена</th><th scope="col">Сумма</th><th scope="col">Скидка</th><th scope="col">Сумма c учетом скидки</th></tr></thead><tbody >';
            for ( var good in dateAnswer )
            {
                table += '<tr class="rowGoods' + dateAnswer [good].id + '">';
                table += '<td>' + dateAnswer [good].nameFull + '</td>';
                table += '<td>' + dateAnswer [good].count + '</td>';
                table += '<td>' + dateAnswer [good].price + '</td>';
                table += '<td>' + dateAnswer [good].count * dateAnswer [good].price + '</td>';
				table += '<td>' + dateAnswer [good].discount + ' %</td>';
								
				var goodDiscount = dateAnswer [good].count * dateAnswer [good].price * (( 100 - dateAnswer [good].discount ) / 100) ;
				table += '<td>' + Math.floor ( goodDiscount ) + '</td></tr>';
            };
						
			table += '<tr><th>Итого</th><th>-</th><th>-</th>';
            table += '<th>'+Math.floor ( sumGood ) + '</th><th>-</th>';
            table += '<th>'+Math.floor ( sumGoodDiscount ) + '</th></tr>';
            table += '<tr><th colspan="5">Скидка "Счастливый час (-7% за заказ с 00:00 до 08:00)"</th>';
			table += '<th>-'+Math.floor ( happyHours ) + '</th></tr>';
			table += '<tr><th colspan="5">Скидка за самовывоз (10%)</th>';
            table += '<th>-'+Math.floor ( delivery ) + '</th></tr>';
            table += '<tr><th colspan="5">Сумма к оплате</th>';
            table += '<th>' + totalCoast + '</th></tr>';
            table += ('</table>');
            var modal = $( '.orderModalBody' );
            modal.empty ();
            modal.append ( table );
        }
    });
};

function renderAdmin ()
{
    $.ajax ({
        url: 'c/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: { renderAdmin: 1 },
        error: function ( req, text, error )
        {
            alert ( 'Хьюстон, У нас проблемы! ' + text + ' | ' + error );
        },
        success: function ( dateAnswer)  
        {
		    var table = '<div class="headTable"><div class="headerCell id">Id</div><div class="headerCell nameFull">Hаименование</div><div class="headerCell price">Цена</div><div class="headerCell param">Состав</div><div class="headerCell weight">Вес</div><div class="headerCell discount">скидка</div><div class="headerCell loadFile">Загрузить фото</div><div class="headerCell stickerAdmin">Fit</div><div class="headerCell stickerAdmin">Hit</div><div class="headerCell views">просмотры</div><div class="headerCell operation">Операции</div></div>';
            for ( var key in dateAnswer )
            {
                table += '<form class="formAdmin" id="form' + dateAnswer [key].id + '" onsubmit="editGood(' + dateAnswer [key].id + ')" action="javascript:void(null);" method="POST" enctype="multipart/form-data">';
				table += '<div class="rowCell  id" name="id">' + dateAnswer [key].id + '</div>';
                table += '<input type="hidden" name="id" value="' + dateAnswer [key].id + '">';
                table += '<input type="hidden" name="edit" value="1">';
                table += '<input type="text" name="nameFull" class="rowCell nameFull" value="' + dateAnswer [key].nameFull + '">';
                table += '<input type="text" name="price" class="rowCell price" value="' + dateAnswer [key].price + '">';
                table += '<textarea type="text" name="param" class="rowCell param">' + dateAnswer [key].param + '</textarea>';
                table += '<input type="text" name="weight" class="rowCell weight" value=' + dateAnswer [key].weight + '>';
                table += '<input type="text" name="discount" class="rowCell discount" value=' + dateAnswer [key].discount + '>';
                table += '<input class="rowCell loadFile" type="file" id="userfile" name="userfile" class="rowCell  loadFile">';
				if ( dateAnswer [key].stickerFit == 1 )
					table += '<div class="rowCell stickerAdmin"><input type="checkbox" name="stickerFit" checked ></div>';
				else
					table += '<div class="rowCell stickerAdmin"><input type="checkbox" name="stickerFit"></div>';
                if ( dateAnswer [key].stickerHit == 1 )
					table += '<div class="rowCell stickerAdmin"><input type="checkbox" name="stickerHit"  checked></div>';
				else
					table += '<div class="rowCell stickerAdmin"><input type="checkbox" name="stickerHit"></div>';
				table += '<div class="rowCell views">' + dateAnswer [key].views + '</div>';
                table += '<input class="btnAdmin" type="submit" value="Сохранить"><button class="btnAdmin" onclick="deleteGood(' + dateAnswer [key].id + ')" >Удалить</button></form>';
            }
            var tableGoodsAdmin = $( '.mainTable' );
            tableGoodsAdmin.empty ();
            tableGoodsAdmin.append ( table );
        }
    });
}

function deleteGood ( id )
{
    $.ajax ({
        url: '../c/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: { deleteGoodId: id },
        error: function ( req, text, error )
        {
            alert ( 'Хьюстон, У нас проблемы! ' + text + ' | ' + error );
        },
        success: function ( dateAnswer )
        {
            renderAdmin ();
        }
    });
};

function addNewGood ()
{
    $.ajax ({
        url: '../c/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: { addNewGood: 1 },
        error: function ( req, text, error )
        {
            alert ( 'Хьюстон, У нас проблемы! ' + text + ' | ' + error );
        },
        success: function ( dataAnswer )
        {
            renderAdmin ();
        },
    });
};

function editGood ( idGood )
{
    var formData = new FormData ( $( '#form' + idGood )[0] );
    $.ajax({
        url: '../c/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        error: function ( req, text, error )
        {
            alert ( 'Хьюстон, У нас проблемы! ' + text + ' | ' + error );
        },
        success: function ( dataAnswer )
        {
            if ( dataAnswer ['type'] == 0 )
                alert ( dataAnswer ['response'] );
            renderAdmin ();
        },
    });

};

function renderOrderEnd ()
{
    $.ajax ({
        url: 'c/Basket.php',
        type: 'POST',
        dataType: 'json',
        data: { renderOrder: 1 },
        error: function ( req, text, error )
        {
            alert ( 'Хьюстон, У нас проблемы! ' + text + ' | ' + error );
        },
        success: function ( dateAnswer )
        {
			var sumGood = 0;
			var sumGoodDiscount=0;
			var happyHours;
			var delivery;
            for ( var key in dateAnswer )
            {
                sumGood += dateAnswer [key].count * dateAnswer [key].price;
				if ( dateAnswer [key].discount > 0 )
					sumGoodDiscount += dateAnswer [key].count * dateAnswer [key].price * (( 100 - dateAnswer [key].discount ) / 100 );
				else
					sumGoodDiscount += dateAnswer [key].count * dateAnswer [key].price;
            }
						
            var date = new Date ( dateAnswer [0].timeOrder * 1000 );
            var hours = date.getHours ();
			var minutes = "0" + date.getMinutes ();
			var formattedTime = hours + ':' + minutes.substr ( -2 );
			
			if ( hours >= 0 && hours <= 7 )
				happyHours = sumGoodDiscount*7/100;
			else
				happyHours = 0;
					
			if ( dateAnswer [key].delivery == 0 )
				delivery=0;
			else
				delivery=sumGoodDiscount*10/100;
			   
			var totalCoast = Math.floor ( sumGoodDiscount - happyHours - delivery );
			   
            var table = '<table class="table "><thead><tr><th scope="col">Наименование</th><th scope="col">Количество</th></tr></thead><tbody >';
            for ( var key in dateAnswer )
            {
                table += '<tr><td>' + dateAnswer[key].nameFull + '</td>';
                table += '<td>' + dateAnswer[key].count + '</td>';
            };
            table += '<tr><th colspan="1">Сумма к оплате с учетом всех скидок</th>';
            table += '<th>'+totalCoast+' &#8381;</th></tr>';
				
			table += '<tr><th colspan="1">Доставка</th>';
				 
            if ( dateAnswer [key].delivery == 0 )
                table += '<th>Доставка по адресу заказчика</th></tr>';
			else
				table += '<th>Самовывоз</th></tr>';
			table += ('</table>');
			table += '<div class="thanks">Ваш заказ поступил в обработку!<br> В ближайшее время с Вами свяжется менеджер для подтверждения и уточнения заказа.<br> Спасибо что выбрали нас!</div>';
           
            var orderTableEnd = $( '.orderTableEnd' );
            orderTableEnd.empty ();
            orderTableEnd.append ( table );
        }
    });
};

function renderHistory ()
{
    $.ajax ({
        url: 'c/Basket.php',
        type: 'POST',
        dataType: 'json',
        data: { renderHistory: 1 },
        error: function ( req, text, error )
        {
            alert ( 'Хьюстон, У нас проблемы! ' + text + ' | ' + error );
        },
        success: function ( dateAnswer )
        {
            var table = '<table class="table table-hover table-bordered"><thead><tr><th scope="col">#</th><th scope="col">Заказ</th><th scope="col">Сумма к оплате</th><th scope="col">Время заказа</th><th scope="col">Сдача с купюры</th><th scope="col">Способ оплаты</th><th scope="col">Доставка/самовывоз</th><th scope="col">Заказ на время</th><th scope="col">Телефон</th><th scope="col">Дисконтная карта</th><th scope="col">Персон</th><th scope="col">Адрес</th><th scope="col">Комментарий</th></tr></thead><tbody>';

            for ( var order in dateAnswer )
            {
                table += '<tr><th scope="row">' + dateAnswer [order].id + '</th>';
                table += '<td><button type="button" onclick="renderHistoryModalOrder(' + dateAnswer [order].id + ')" class="btn btn-primary" data-toggle="modal" data-target="#orderModal">Детали заказа</button></td>';
                table += '<td>' + dateAnswer [order].payAmount + '</td>';

                var date = new Date ( dateAnswer [order].timeOrder * 1000 );
                var hours = date.getHours ();
                var minutes = "0" + date.getMinutes ();
                var formattedTime = hours + ':' + minutes.substr ( -2 );
                table += '<td>' + formattedTime + '</td>';

                table += '<td>' + dateAnswer [order].money + '</td>';
                if ( dateAnswer [order].pay == 1 )
                    table += '<td>Безнал</td>';
                else
                    table += '<td>Нал</td>';
                if ( dateAnswer [order].delivery == 0 )
                    table += '<td>Доставка</td>';
                else
                    table += '<td>Самовывоз</td>';
                table += '<td>' +  dateAnswer [order].desiredTime + '</td>';
                table += '<td>' + dateAnswer [order].phone+'</td>';
                table += '<td>' + dateAnswer [order].discountCard+'</td>';
                table += '<td>' + dateAnswer [order].persons+'</td>';
                table += '<td>' + dateAnswer [order].address+'</td>';
            }
            table += '<tbody></table>';
            var mainTableManager = $( '.mainTableManager' );
            mainTableManager.empty ();
            mainTableManager.append ( table );
        }
    });
};

function renderHistoryModalOrder ( orderId )
{
    $.ajax ({
        url: 'c/Basket.php',
        type: 'POST',
        dataType: 'json',
        data: { renderOrderFromHistory: orderId },
        error: function ( req, text, error )
        {
            alert ( 'Хьюстон, У нас проблемы! ' + text + ' | ' + error );
        },
        success: function ( dateAnswer )
        {
			var sumGood = 0;
			var sumGoodDiscount = 0;
			var happyHours;
			var delivery;
            for ( var key in dateAnswer )
            {
				sumGood += dateAnswer [key].count * dateAnswer [key].price;
    			sumGoodDiscount += dateAnswer [key].count * dateAnswer [key].price * (( 100 - dateAnswer [key].discount ) / 100 );
            };
						
			var date = new Date ( dateAnswer [0].timeOrder * 1000 );
			var hours = date.getHours ();
			var minutes = "0" + date.getMinutes ();
			var formattedTime = hours + ':' + minutes.substr ( -2 );
			
            if ( hours >= 0 && hours <= 7 )
				happyHours = sumGoodDiscount * 7 / 100;
			else
				happyHours = 0;
			
			if ( dateAnswer [key].delivery == 0 )
				delivery = 0;
			else
				delivery = sumGoodDiscount * 10 / 100;
		   
     	    var totalCoast = Math.floor ( sumGoodDiscount - happyHours - delivery );
			   
            var table = '<table class="table table-hover table-bordered"><thead><tr><th scope="col">Наименование</th><th scope="col">Количество</th><th scope="col">Цена</th><th scope="col">Сумма</th><th scope="col">Скидка</th><th scope="col">Сумма c учетом скидки</th></tr></thead><tbody >';
            for ( var good in dateAnswer )
            {
                table += '<tr class="rowGoods' + dateAnswer [good].id + '">';
                table += '<td>' + dateAnswer [good].nameFull + '</td>';
                table += '<td>' + dateAnswer [good].count + '</td>';
                table += '<td>' + dateAnswer [good].price + '</td>';
                table += '<td>' + dateAnswer [good].count * dateAnswer [good].price + '</td>';
				table += '<td>' + dateAnswer [good].discount + ' %</td>';
								
				var goodDiscount = dateAnswer [good].count * dateAnswer [good].price * (( 100 - dateAnswer [good].discount ) / 100) ;
				table += '<td>' + Math.floor ( goodDiscount ) + '</td></tr>';
            };
						
			table += '<tr><th>Итого</th><th>-</th><th>-</th>';
            table += '<th>'+Math.floor ( sumGood ) + '</th><th>-</th>';
            table += '<th>'+Math.floor ( sumGoodDiscount ) + '</th></tr>';
            table += '<tr><th colspan="5">Скидка "Счастливый час (-7% за заказ с 00:00 до 08:00)"</th>';
			table += '<th>-'+Math.floor ( happyHours ) + '</th></tr>';
			table += '<tr><th colspan="5">Скидка за самовывоз (10%)</th>';
            table += '<th>-'+Math.floor ( delivery ) + '</th></tr>';
            table += '<tr><th colspan="5">Сумма к оплате</th>';
            table += '<th>' + totalCoast + '</th></tr>';
            table += ('</table>');
            var modal = $( '.orderModalBody' );
            modal.empty ();
            modal.append ( table );
        }
    });
};
