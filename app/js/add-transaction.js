$(document).ready(function(){
    $(".btn-add").click(function(){
        $("#no-indent").append('<li>'+
        '<div class="pane-content">'+
            '<h2>Transaction</h2>' +
            '<form id="form_transaction" action="phpscripts/transactions_insert.php" method="POST" name="form_transaction" autocomplete="off">'+
                '<ul>'+
                    '<li>'+
                        '<div class="div-l">'+
                            '<label>Name</label>'+
                            '<input type="text" value="" id="name" name="name" placeholder="Transaction name" class="textfield">'+
                        '</div>'+
                        '<div class="div-r">'+
                            '<label id="title-income">Total Income</label>'+
                            '<input type="number" value="0" id="income" name="income" placeholder="Total expense" class="textfield" min="0" step="10000">'+
                        '</div>'+
                    '</li>'+
                    '<li>'+
                        '<div class="div-l">'+
                            '<label>Description</label>'+
                            '<textarea style="resize:none" value="" id="desc" name="desc" placeholder="Transaction description" class="textfield" rows="4" cols="50"></textarea>'+
                        '</div>'+
                        '<div class="div-r">'+
                            '<label id="title-expense">Total Expense</label>'+
                            '<input type="number" value="0" id="expense" name="expense" placeholder="Total expense" class="textfield" min="0" step="10000">'+
                        '</div>'+
                    '</li>'+
                    '<li>'+
                        '<input type="submit" class="btn-save" value="Save">'+
                        '<div id="error2"></div>'+
                    '</li>'+
                '</ul>'+
            '</form>'+
        '</div>'+
    '</li>'); 
    });
});