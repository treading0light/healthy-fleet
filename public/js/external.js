// Originally I used JS to do much of what I let laravel do now.
// This is that JS

async function fetchFleet() {
  // fetch data from php and convert to json

  let url = 'fleet_retrieve.php';

  try {

    // res recieves the promise, then data as str
    let res = await fetch(url);
    // convert string to json
    res = await res.json();

    return res;


  } catch (error) {

    console.log(error);
  }
}

async function renderFleet() {
  // uses assoc arrays nested in array to build
  // a block of html for each then adds to page

  // trucks recieves promise then json
  let trucks = await fetchFleet();

  let html = '';

  // loop through array and use data from each assoc
  trucks.forEach(truck => {

    let htmlSegment =`<div class='truck_block'>

                        <h3>Truck ${truck.id}</h3>

                        <img src='truck_22.jpg'>

                        <div id='redundant'>
                          <div class='truck_table'>

                            <table>
                              <tr> <td>Current mileage:</td> <td>${truck.mileage}</td> </tr>
                              <tr> <td>Last mileage update</td> <td>11/11/21</td> </tr>
                              <tr> <td>Next service due:</td> <td>600 mi.</td> </tr>

                            </table>
                          </div>

                          
                          <a class='button' href='/truck?truck_id=${truck.id}'>View</a>
                        </div>

                      </div>
                      <hr>`;

                      
    html += htmlSegment;
    // <button onclick="window.location.href='truck_view.php?truck_id=${truck.id}">View</button>
    



  });

  // select DOM element and populate
  let container = document.querySelector('.container');
  container.innerHTML = html;
}


async function fetchTruck(truck_id) {

  let url = "fleet_retrieve.php?truck_id=" + truck_id;

  try {

    let res = await fetch(url);

    res = await res.json();
    console.log(res);

    return res;

  } catch (error) {
    console.log(error);
  }
}

async function renderTruck(truck_id) {


  let truck = await fetchTruck(truck_id);
  // console.log(truck);

  let html = `<h3>Truck ${truck.id}</h3>

        <div class='truck_bio'>
            

            <img src='truck_22.jpg'>

            <div id='bio_table'></div>

                <table>
                    <tr><td>Year</td><td>${truck.year}</td></tr>
                    <tr><td>Make/Model</td><td>${truck.make}</td></tr>
                    <tr><td>Mileage</td><td>${truck.mileage}</td></tr>
                </table>
            
        </div>`;

  let container = document.querySelector('.container');
  container.innerHTML = html;      

}

async function addTruck() {

  let data = grabData();

  let url = "add_new.php"
  let options = {
    method: 'POST',
    body: 'JSON.stringify(data)'
  };

  console.log(JSON.stringify(data));

  let res = await fetch(url, options)
    .then(res => res.json())
    .then(res => {
      alert(res);
    });
}

function grabData() {

  const data = {};

  data["id"] = document.getElementById("truck_id");
  data["year"] = document.getElementById("truck_year");
  data["make"] = document.getElementById("truck_make");
  data["model"] = document.getElementById("truck_model");
  data["mileage"] = document.getElementById("mileage");

  return data;
}




  