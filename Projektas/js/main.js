// test
console.log("labas");
// alert("issokanti zinute");
// document.write("labas ekrane");

// **********Drop-Down menu*************
// Pirmas
$(".menu-item-1").on("click", function() {
  $(".menu-item-1").css("background-color", "rgb(210, 210, 210)");
  $(".drop-down-1").show();
});
$(".menu-item-1").on("mouseleave", function() {
  $(".menu-item-1").css("background-color", "inherit");
  $(".drop-down-1").hide();
});

// ANtras
$(".menu-item-2").on("click", function() {
  $(".menu-item-2").css("background-color", "rgb(210, 210, 210)");
  $(".drop-down-2").show();
});
$(".menu-item-2").on("mouseleave", function() {
  $(".menu-item-2").css("background-color", "inherit");
  $(".drop-down-2").hide();
});

// Trecias
$(".menu-item-3").on("click", function() {
  $(".menu-item-3").css("background-color", "rgb(210, 210, 210)");
  $(".drop-down-3").show();
});
$(".menu-item-3").on("mouseleave", function() {
  $(".menu-item-3").css("background-color", "inherit");
  $(".drop-down-3").hide();
});

// Ketvirtas
$(".menu-item-4").on("click", function() {
  $(".menu-item-4").css("background-color", "rgb(210, 210, 210)");
  $(".drop-down-4").show();
});
$(".menu-item-4").on("mouseleave", function() {
  $(".menu-item-4").css("background-color", "inherit");
  $(".drop-down-4").hide();
});



// *********SEARCH WINDOW**********
$(".search-button").on("mouseenter", function() {
  $(".search-window").show();
});
$("header").on("mouseleave", function() {
  $(".search-window").hide();
});

// ***********LOGIN WINDOW*************************
$(".login").on("click", function() {
  $(".user-window").show();
  $(".login-window").show();
});
$(".close-login").on("click", function() {
  $(".login-window").hide();
  $(".login-failed").hide();
});

// ************REGISTER WINDOW************************
$(".register-btn").on("click", function() {
  $(".register-window").show();
});
$(".close-register").on("click", function() {
  $(".register-window").hide();
  $(".registration-successful").hide();
});

// **************USER WINDOW*****************
// $(".login").on("click", function() {
//   $(".user-window").show();
// });
$(".close-user").on("click", function() {
  $(".user-window").hide();
});


// **************user registration****************
$(".submit-registration-btn").on("click", function() {
  $(this).parent().find("input").removeClass("bg-danger");
  let name = $(this).parent().find("[name='name']").val();
  let lname = $(this).parent().find("[name='lname']").val();
  let username = $(this).parent().find("[name='username']").val();
  let pass = $(this).parent().find("[name='pass']").val();
  let passRep = $(this).parent().find("[name='passRep']").val();
  let email = $(this).parent().find("[name='email']").val();
  let adress = $(this).parent().find("[name='adress']").val();
  let postCode = $(this).parent().find("[name='postCode']").val();
  if (name == false || lname == false || username == false || pass == false || passRep == false || email == false || adress == false || postCode == false) {
    $(".register-window").find(".fill-fields").show();
  } else {
    $.ajax({
      url: "../controller/register.php",
      type: "POST",
      data: {name: name, lname: lname, username: username, pass: pass, passRep: passRep, email: email, adress: adress, postCode: postCode},
      success: function(gryzo) {
        console.log("suveike");
        if (jQuery.isEmptyObject(gryzo)) {
          $(".registration-successful").show();
        } else {
          let errors = JSON.parse(gryzo);
          console.log(errors);
          if (errors.username == "error") {
            $(".register-window").find("[name='username']").addClass("bg-danger");
            delete errors.username;
          }
          if (errors.email == "error") {
            $(".register-window").find("[name='email']").addClass("bg-danger");
            delete errors.email;
          }
          if (errors.pass == "error") {
            $(".register-window").find("[name='pass']").addClass("bg-danger");
            $(".register-window").find("[name='passRep']").addClass("bg-danger");
            delete errors.pass;
          }
        }
      },
      error: function(e) {
        console.log("nesuveike");

      }
    });
  }
});

// *************USER LOGIN*************************
$(".login-btn").on("click", function() {
  $(".login-failed").hide();
  let username = $(this).parent().find("[name='username']").val();
  let pass = $(this).parent().find("[name='pass']").val();
  $.ajax({
    url: "../controller/login-validation.php",
    type: "POST",
    data: {username: username, pass: pass},
    success: function(gryzo) {
      console.log("suveike");
      if (jQuery.isEmptyObject(gryzo)) {
        location.reload();
      } else {
        let login = JSON.parse(gryzo);
        $(".login-failed").show();
        delete login.login;

      }
    },
    error: function(e) {
      console.log("nesuveike");

    }
  });
});


// ***********CARD CATEGORIES*****************
// pirmas
$("#card-first").on("mouseenter", function() {
  $(this).find("#card-main-first").hide();
  $(this).find("#card-subsidiary-first").show();
});
$("#card-first").on("mouseleave", function() {
  $(this).find("#card-subsidiary-first").hide();
  $(this).find("#card-main-first").show();
});

// antras
$("#card-second").on("mouseenter", function() {
  $(this).find("#card-main-second").hide();
  $(this).find("#card-subsidiary-second").show();
});
$("#card-second").on("mouseleave", function() {
  $(this).find("#card-subsidiary-second").hide();
  $(this).find("#card-main-second").show();
});

// treciass
$("#card-third").on("mouseenter", function() {
  $(this).find("#card-main-third").hide();
  $(this).find("#card-subsidiary-third").show();
});
$("#card-third").on("mouseleave", function() {
  $(this).find("#card-subsidiary-third").hide();
  $(this).find("#card-main-third").show();
});

// ketvirtas
$("#card-fourth").on("mouseenter", function() {
  $(this).find("#card-main-fourth").hide();
  $(this).find("#card-subsidiary-fourth").show();
});
$("#card-fourth").on("mouseleave", function() {
  $(this).find("#card-subsidiary-fourth").hide();
  $(this).find("#card-main-fourth").show();
});


// *****************ADD TO SHOPPING CART*******************

// let itemId = $(".item-id").val();
// console.log(itemId);

// is results puslapio idejimas i session
$(".add-to-cart-res").on("click", function() {
  let imgLoc = $(this).parent().find("img");
  let img = imgLoc.clone().appendTo("main");
  img.addClass("clone").attr({height: '50px', width: '70px'});
  img.animate({top: '200px', right: '0', opacity: "0"}, "slow");
  img.animate({top: '0', right: '0', opacity: "0"});
  let itemId = $(this).attr("itemId");
  console.log(itemId);
  $.ajax({
    url: "../controller/add-item-to-session.php",
    type: "POST",
    data: {id: itemId},
    success: function(gryzo) {
      console.log("suveike");
      console.log(gryzo);
    },
    error: function(e) {
      console.log("nesuveike");
    }
  });
});



// is item puslapio idejimas i session
$(".add-to-cart-item").on("click", function() {
  let imgLoc = $(this).parent().parent().find("div .active").find("img");
  let img = imgLoc.clone().appendTo("main")
  img.addClass("clone").attr({height: '50px', width: '100px'}).removeClass("w-100");
  img.animate({top: '200px', right: '0', opacity: "0"}, "slow");
  img.animate({top: '0', right: '0', opacity: "0"});
  let itemId = $(this).attr("itemId");
  let itemQty = parseInt($(this).parent().find(".qty").val());
  $.ajax({
    url: "../controller/add-item-to-session.php",
    type: "POST",
    data: {id: itemId, qty: itemQty},
    success: function(gryzo) {
      console.log("suveike");
      console.log(gryzo);
    },
    error: function(e) {
      console.log("nesuveike");
    }
  });
});


// padidinti prekiu kieki pirkiniu krepselyje**************
// padidinti suma pirkiniu krepselyje**************
$(".increase-qty").on("click", function() {
  let itemId = $(this).attr("itemId");
  let itemPrice = parseInt($(this).attr("itemPrice"));
  // console.log(itemPrice);
  let totalPrice = parseInt($(this).parent().parent().parent().parent().find(".total-price").text());
  // console.log(totalPrice);
  totalPrice += itemPrice;
  $(this).parent().parent().parent().parent().find(".total-price").text(totalPrice);
  let itemQty = parseInt($(this).parent().find(".qty").text());
  itemQty++;
  $(this).parent().find(".qty").text(itemQty);
  $.ajax({
    url: "../controller/increase-qty.php",
    type: "POST",
    data: {id: itemId},
    success: function(gryzo) {
      console.log("suveike");
      console.log(gryzo);

    },
    error: function(e) {
      console.log("nesuveike");
    }
  });
});


// sumazinti prekiu kieki pirkiniu krepselyje*********************
// sumazinti suma pirkiniu krepselyje*********************
$(".decrease-qty").on("click", function() {
  let itemId = $(this).attr("itemId");
  let itemPrice = parseInt($(this).attr("itemPrice"));
  // console.log(itemPrice);
  let totalPrice = parseInt($(this).parent().parent().parent().parent().find(".total-price").text());
  // console.log(totalPrice);
  let itemQty = parseInt($(this).parent().find(".qty").text());
  if (itemQty > 1) {
    itemQty--;
    $(this).parent().find(".qty").text(itemQty);
    let totalPriceNew = totalPrice - itemPrice;
    $(this).parent().parent().parent().parent().find(".total-price").text(totalPriceNew);
  } else {
    $(this).parent().parent().parent().parent().find(".total-price").text(totalPrice);
  }
  $.ajax({
    url: "../controller/decrease-qty.php",
    type: "POST",
    data: {id: itemId},
    success: function(gryzo) {
      console.log("suveike");
      console.log(gryzo);
    },
    error: function(e) {
      console.log("nesuveike");
    }
  });
});


// istrinti preke is pirkiniu krepselio***************************
// ir sumazinti total suma***************************
$(".delete-item").on("click", function() {
  let itemQty = parseInt($(this).parent().find(".qty").text());
  let totalPrice = parseInt($(this).parent().parent().parent().parent().find(".total-price").text());
  let itemPrice = parseInt($(this).attr("itemPrice"));
  let itemId = $(this).attr("itemId");
  if ((itemPrice * itemQty) == totalPrice) {
    $(".confirm-order").remove();
  }
  let totalPriceNew = totalPrice - ( itemPrice * itemQty );
  $(this).parent().parent().parent().parent().find(".total-price").text(totalPriceNew);
  $.ajax({
    url: "../controller/remove-item-from-session.php",
    type: "POST",
    data: {id: itemId},
    success: function(gryzo) {
      console.log("suveike");
      console.log(gryzo);
    },
    error: function(e) {
      console.log("nesuveike");
    }
  });
  $(this).parent().parent().parent().fadeOut().remove();
});


// **********ADMIN DELETE ITEM******************************
// $(".delete-item-admin").on("click", function() {
//   let itemId = $(this).attr("itemId");
//   $.ajax({
//     url: "../controller/delete-item.php",
//     type: "POST",
//     data: {id: itemId},
//     success: function(gryzo) {
//       console.log("suveike");
//       console.log(gryzo);
//       $(this).parent().fadeOut().remove();
//     },
//     error: function(e) {
//       console.log("nesuveike");
//     }
//   });
// });


// ***************ADMIN and USER ORDER DETAILS**************************

$(".show-admin-order-details").on("click", function() {
  $(this).hide();
  $(this).parent().parent().find(".admin-order-details").show();
  $(this).parent().parent().find(".hide-admin-order-details").show();
});

$(".hide-admin-order-details").on("click", function() {
  $(this).hide();
  $(this).parent().parent().find(".admin-order-details").hide();
  $(this).parent().parent().find(".show-admin-order-details").show();
});


// *************CHANGE USER PASS**************************

$(".change-pass-btn").on("click", function() {
  $(".pass-change-fail").hide();
  $(".pass-change-success").hide();
  let oldPass = $(this).parent().find("[name='oldPass']").val();
  let newPass = $(this).parent().find("[name='newPass']").val();
  let newPassRep = $(this).parent().find("[name='newPassRep']").val();
  $.ajax({
    url: "../controller/change-pass.php",
    type: "POST",
    data: {oldPass: oldPass, newPass: newPass, newPassRep: newPassRep},
    success: function(gryzo) {
      console.log("suveike");
      if (jQuery.isEmptyObject(gryzo)) {
        $(".pass-change-success").show();
      } else {
        let pass = JSON.parse(gryzo);
        $(".pass-change-fail").show();
        delete pass.changePass;
      }
    },
    error: function(e) {
      console.log("nesuveike");
    }
  });
});
