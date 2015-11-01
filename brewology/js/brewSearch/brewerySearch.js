/**
 * Created by shawnotomo on 10/31/15.
 */

//THIS WILL PULL THE INPUT AND SEND IT TO BACK END
function brewerySearch(){
    var location = $('#locationSearch').val();
    console.log(location);
    $.ajax({
        url:'js/brewSearch/breweryQuery.php',
        method: 'POST',
        dataType: 'text',
        data:{
            location: location
        },
        success: function(response){
            console.log('Success, here is the ', response);
        },
        error: function(response){
            console.log('There is an error', response);
        }
    })
}