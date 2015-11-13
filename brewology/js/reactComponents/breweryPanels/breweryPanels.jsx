/**
 * Created by shawnotomo on 11/5/15.
 */
//INPUT: ARRAY OF BREWERIES PASSED FROM PanelContainer
//OUTPUT: ONE PANEL FOR EACH BREWERY THA IS APPENDED TO THE PANEL CONTAINER
var BreweryPanels = React.createClass({
    render: function(){
        var breweryPanelMap = this.props.breweries.map(function(brewery, index){
            var id = brewery.id;

            var name = brewery.name;
            var addressOne = brewery['street number'] + ' ' + brewery['street name'];
            var addressTwo = brewery.city + ', ' + brewery.state + ' ' + brewery.zip1;
            var website = brewery.website;
            var rating = brewery.rating;
            var phone = brewery.phone;
            var breweryURL = "breweryLandingPage.php?id=" + id + "&name=" + name + "&addressOne=" + addressOne + "&addressTwo=" + addressTwo + "&website=" + website + "&phone=" + phone;
            var breweryKey = index;
            return(
                <div  key={breweryKey} className="most-viewed-item col-xs-24 col-sm-8 col-md-6 col-lg-6">
                    <div className="item-cover">
                        <div className="cover">
                            <div className="text">
                                <a href={breweryURL}>Info</a>
                                <a href={website}>{website}</a>
                                <h5>{rating}</h5>
                            </div>
                        </div>
                        <img src="img/most-viewed-1.jpg" alt="item cover" />
                    </div>

                    <div className="item-body">
                        <h4 className="services truncate"><a href={breweryURL}>{name}</a></h4>

                        <div className="location">
                            <p>{addressOne}</p>
                            <p>{addressTwo}</p>
                            <p className="price">{phone}</p>
                        </div>
                    </div>
                </div>
            )
        })


        return(
            <div>
                {breweryPanelMap}
            </div>
        )
    }
});

var BreweryHeader = React.createClass({
   render: function(){
       return(
           <div className="section-header">
               <h1>Breweries</h1>
               <p>Here are the breweries close to where you searched</p>
           </div>
       )
   }
});

//INPUT: FROM INCOMING AJAX CALL IS ARRAY OF BREWRIES RETURNED FROM AJAX CALL
//OUTPUT: CONTAINER WHICH WILL BE APPENDED TO #searchedBreweries
var PanelContainer = React.createClass({
    getInitialState:function(){
        return({
            breweries: breweriesArray,
            lat: lat,
            lng: lng
        })
    },
    checkBreweryArray: function(){
        var latitude = lat;

        var longitude = lng;

        var radius = $('#radius').val();

        $.ajax({
            url:'js/brewSearch/breweryQuery.php',
            method: 'POST',
            dataType: 'JSON',
            data:{
                lat: latitude,
                lng: longitude,
                radius: radius
            },
            success: function(response){
                breweriesArray = response;
                makeMarkers(latitude, longitude, radius, breweriesArray);
                //makePanels(breweriesArray);
                this.setState({
                   breweries: response,
                    lat: lat,
                    lng: lng
                })
                console.log(this.state.breweries, this.state.lat, this.state.lng);
            }.bind(this),
            error: function(response){
                console.log('There is an error', response);
            }.bind(this)
        });


    },
    componentDidMount: function(){
      document.getElementById('sendBrewery').addEventListener('click', this.checkBreweryArray)
    },
    render: function(){
        var renderPanel;
        if(this.state.breweries == null){
            renderPanel = (
                <div>
                    <BreweryHeader />
                </div>
            )
        } else {
            renderPanel = (
                <div>
                    <BreweryHeader />
                    <BreweryPanels breweries={this.state.breweries}/>
                </div>

            )
        }
        return renderPanel;
    }
});

ReactDOM.render(
<PanelContainer />,
    document.getElementById('searchedBreweries')
);
