var members = ["Jeffery Jonas", "Mathew Newman",
"Scott Summers", "Clark Kent",
"Toby Mcguire", "Axle Rose",
"Jean Grey", "Sarah Silverman"
];

var months = [ "jan", "feb", "mar", "apr", "may", "jun", "jul",
  "aug", "sep", "oct", "nov", "dec"];

// var res_div = false;
// var un_div = false;





function mainLoop(group, months) {
  let ledger = {};

  for (var i = 0; i <= months.length - 1; i++) {
    ledger[months[i]] = payBill(members, ledger);
  }
  return ledger
}

function payBill(group, ledger) {
  /*take an array of names and simulate them paying a bill
  initialize record, loop through the group of members*/

  let record = {};

  for (let i = group.length - 1; i >= 0; i--) {
    markLedger(group[i], record);
      }

  gatherUnpaid(record);
  return record
}

function randomPay(group) {
  /*for each member, randomly select if they paid or not
  return boolean*/

  // console.log("randomPay start")

  var ran = Math.random();

  if(ran <= .25) {
    return false;
  } else {
      return true;
  }  
}

function markLedger(person, record) {
  let paid = randomPay(person)
    if (paid) {
      record[person] = 'paid';
      // console.log("payBill mark paid" + group[i]);
    } else {
      record[person] = 'unpaid';
      // console.log("payBill mark unpaid" + group[i]);
  return record;
  }
}

function gatherUnpaid(record) {
  /*check current month for unpaid and send reminder*/
  let unpaid = [];
  let length = Object.keys(record).length;
  // console.log(length);
  // console.log(record);

  for (let key in record) {
    if(record[key] == 'unpaid') {
      // console.log(key);
      unpaid.push(key);
    }
  }
  contactUnpaid(unpaid);
  
}

function contactUnpaid(unpaid) {

  for (var i = unpaid.length - 1; i >= 0; i--) {
    // console.log("Sent " + unpaid[i] + " a friendly reminder to pay the fuck up");
  }
}


function showResults(array, div) {

  div.style.display = "block";

  let h1 = document.createElement("h1");
  let title = document.createTextNode("One month");
  h1.appendChild(title);
  div.append(h1);
    
  for (key in array) {

    let h2 = document.createElement("h2");
    let h3 = document.createElement("h3");
    let name = document.createTextNode(key);
    let status = document.createTextNode(array[key]);

    h2.appendChild(name);
    h3.appendChild(status);
    div.append(h2,h3);
    console.log(div);
  }
}

function fillTable(data, status, div) {
  if(status == "unpaid") {
    div.appendChild(buildUnpaid(data));
  } else if(status == "full") {
    for(month in data) {
      div.appendChild(buildFull(data[month]), month);
      // console.log(month);
    }
  }
}

function buildFull(data, month) {
  // return table
  let table = document.createElement("table");
  table.appendChild(makeCaption(month));

  for(let name in data) {
    tr = document.createElement("tr");

    let col1 = makeTD(name);
    let col2 = makeTD(data[name]);
    tr.appendChild(col1);
    tr.appendChild(col2);
    table.appendChild(tr);
  }
  return table
}

function buildUnpaid(data) {
  let unpaid = getUnpaid(data);

  let table = document.createElement("table");
  table.appendChild(makeCaption("Missed payments this year"));

  for(name in unpaid) {
    tr = document.createElement("tr");

    let col1 = makeTD(name);
    let col2 = makeTD(unpaid[name]);
    tr.appendChild(col1);
    tr.appendChild(col2);
    table.appendChild(tr);
  }
  return table;
}

function getUnpaid(data) {
  let unpaid = {};
  for(name in data['jan']) {
    unpaid[name] = 0;
  }

  for(month in data) {
    for(name in month) {
      unpaid[name] += 1;
    }
  }
  return unpaid;
}

function makeTD(text) {
  td = document.createElement("td");
  txt = document.createTextNode(text);
  td.appendChild(txt);
  return td
}

function makeCaption(txt) {
  let cap = document.createElement("caption");
  let captxt = document.createTextNode("Rent " + month);
  cap.appendChild(captxt);
  return cap
}

var ledger_1 = mainLoop(members, months);

// var res_div = false;
// var un_div = false;

// while(res_div == true) {
//   un_div = false;
//   document.getElementById("results").style.display = "block";
//   document.getElementById("results_btn").style.display = "none";
//   document.getElementById("unpaid_btn").style.display = "block";
// }

// while(un_div = true) {
//   res_div = false;
//   document.getElementById("unpaid").style.display = "block";
//   document.getElementById("results_btn").style.display = "block";
//   document.getElementById("unpaid_btn").style.display = "none";
// }