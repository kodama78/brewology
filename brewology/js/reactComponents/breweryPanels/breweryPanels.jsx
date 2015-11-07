/**
 * Created by shawnotomo on 11/5/15.
 */

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

var BreweryPanel = React.createClass({
    getInitialState:function(){
        return{
            breweries: breweriesArray
        }
    },
    render: function(){
        return(
            <div>
                <BreweryHeader />
                <div className="most-viewed-item col-xs-24 col-sm-8 col-md-6 col-lg-6">
                    <div className="item-cover">
                        <div className="cover">
                            <div className="text">
                                <a href="single.html">Info</a>
                                <p>Nulla posuere, egestas neque quis, suscipit eros. Vestibulum ut eros neque. Nam viverra maximus neque id convallis. In auctor eu quam sit amet</p>
                            </div>
                        </div>
                        <img src="img/most-viewed-1.jpg" alt="item cover" />
                    </div>

                    <div className="item-body">
                        <ul className="services">
                            <li><p className="bathrooms">Bathrooms: <span>1</span></p></li>
                            <li><p className="bedrooms">Bedrooms: <span>2</span></p></li>
                            <li><p className="area">Area: <span>100</span></p></li>
                        </ul>

                        <div className="location">
                            <h3>
                                <a href="single.html">Grand hotel room</a>
                            </h3>
                            <p>LA 325</p>

                            <span className="price">$450 000</span>
                        </div>
                    </div>
                </div>
            </div>

        )
    }
});

ReactDOM.render(
<BreweryPanel />,
    document.getElementById('searchedBreweries')
);