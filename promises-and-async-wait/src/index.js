import "./styles.css";

const saySomething = function(something) {
  var x = document.createElement("P"); // Create a <p> node
  var t = document.createTextNode(something); // Create a text node
  x.appendChild(t); // Append the text to <p>
  document.body.appendChild(x);
};

const saySomethingPromise = () => {
  return new Promise(function(resolve, reject, error = false) {
    if (error) {
      reject(saySomething("error!"));
    }

    setTimeout(function() {
      resolve(saySomething("promise done!"));
    }, 3000);
  });
};

/* Usage: uncomment each chunk below at a time to test */

/* default JS behaviour */
// saySomething('first text bit');
// setTimeout(function(){ saySomething("this will show after 3 seconds"); }, 3000);
// saySomething('this will show before setTimeout');

/* using promises */
// saySomething('first text bit');
// saySomethingPromise().then(function(){
//   saySomething('this will now show after promise is done');
// });

/* using async/await */
// async function sayStuff() {
//   saySomething('second text bit');
//   await saySomethingPromise();
//   saySomething('this will now show after');
// }
// sayStuff();
