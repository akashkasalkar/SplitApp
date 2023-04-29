var firebaseConfig = {
    apiKey: "AIzaSyBPE8hfvJmp7IO6JpAgOB0CC35xA01Y-t0",
    authDomain: "msons-b9c76.firebaseapp.com",
    databaseURL: "https://msons-b9c76-default-rtdb.firebaseio.com/",
    projectId: "msons-b9c76",
    storageBucket: "msons-b9c76.appspot.com",
    messagingSenderId: "91274401886",
    appId: "1:91274401886:web:e844876bb90aa245c77ccf",
    measurementId: "G-D4MV3NEQZ2"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();

function validate() {
    document.getElementById('spinner').style.removeProperty('display');
    document.getElementById('submitBtn').disabled = true;

    var uname = document.getElementById('uname').value;
    var pass = document.getElementById('pass').value;
    // var unameRGEX = /^[A-Za-z]+$/;
    // var unameResult = unameRGEX.test(uname);

    // var passRGEX = /^[A-Za-z@0-9]+$/;
    // var passResult = passRGEX.test(pass);
    if (uname != "" && pass != "") {
        firebase.auth().signInWithEmailAndPassword(uname, pass).then(() => {
            // Signed in 
            // console.log(user);
            var currentFirebaseUser = firebase.auth().currentUser.email;
            sessionStorage.setItem("sessionAuth", currentFirebaseUser);
            // console.log(currentFirebaseUser);
            location.href = "home.html";

            // ...
        })
            .catch((error) => {
                document.getElementById('login-w').style.display = 'block';
                document.getElementById('spinner').style.setProperty('display', 'none');
                document.getElementById('submitBtn').disabled = false;
                document.getElementById('uname').value = null;
                document.getElementById('pass').value = null;
                var errorCode = error.code;
                var errorMessage = error.message;
                console.log("Error" + errorCode);
                console.log("Error" + errorMessage);
                // ..
            });
        // sessionStorage.setItem("uname",uname);
        // location.reload();
        // $.ajax({
        //     url:'http://localhost/divyajyoti_api/api/login/validate.php?uname='+uname+'&pass='+pass+'',
        //     type: 'GET',
        //     dataType:'JSON',
        //     success:function(response){
        //         if(response.uname==null){
        //             document.getElementById('login-w').style.display='block';
        //         }else{
        //         $.ajax({
        //             url:'index.php?validate',
        //             type:'POST',
        //             data:{
        //                 'uname':response.uname
        //             },
        //             success:function(response){
        //                 location.reload();
        //             }
        //         });
        //     }
        //     }
        // });
    } else {
        document.getElementById('login-d').style.display = 'block';
    }
}

getProduct();

// image proccessing
var ImgName, ImgUrl, ProductTitle, Description;
var files = [];
var reader;

function selectImage() {
    var input = document.createElement('input');
    input.type = 'file';
    input.onchange = e => {
        files = e.target.files;
        reader = new FileReader();
        reader.onload = function () {
            document.getElementById('slider1').src = reader.result;
        }
        reader.readAsDataURL(files[0]);
        if (files[0] != null) {
            document.getElementById("savebtn").disabled = false;
            document.getElementById('title').disabled = false;
            document.getElementById('description').disabled = false;
        } else {
            document.getElementById("savebtn").disabled = true;
        }
    }
    input.click();
}

function uploadImage() {


    ProductTitle = document.getElementById('title').value;
    Description = document.getElementById('description').value;
    if (ProductTitle != "" && Description != "") {
        $("#spinner").modal("show");

        ImgName = new Date().getTime();
        var uploadTask = firebase.storage().ref('products/' + ImgName + ".jpg").put(files[0]);

        uploadTask.on('state_changed', function (snapshot) {
            var progress = (snapshot.byteTransferred / snapshot.totalBytes) * 100;
            //document.getElementById('upProgress').innerHTML='Upload'+progress+'%';
        }, function (error) {
            // alert("Error while saving image" + error);
            $("#danger").modal("show");
            $("#spinner").modal("hide");
            document.getElementById('savebtn').disabled = true;
        },
            function () {
                uploadTask.snapshot.ref.getDownloadURL().then(function (url) {
                    ImgUrl = url;


                    firebase.database().ref('products_info/' + ImgName).set({
                        Name: ImgName,
                        Link: ImgUrl,
                        Title: ProductTitle,
                        Description: Description
                    });
                    document.getElementById('savebtn').disabled = true;
                    document.getElementById('title').value = "";
                    document.getElementById('description').value = "";
                    document.getElementById('title').disabled = true;
                    document.getElementById('description').disabled = true;
                    document.getElementById('slider1').src = "";
                    $("#spinner").modal("hide");
                    $("#success").modal("show");
                    getProduct();
                    // alert("Image added successfully");
                });
            });
    } else {
        $("#danger").modal("show");
        $("#spinner").modal("hide");
        alert("Please enter Product title and Description!")
    }

}

function getProduct() {
    firebase.database().ref('products_info/').once('value', function (snap) {
        var data = JSON.stringify(snap.val());
        var jsonData = JSON.parse(data);
        $("tbody").children().remove()
        var tbodyRef = document.getElementById('product_table').getElementsByTagName('tbody')[0];
        jQuery.each(jsonData, function (i, val) {
            
            var newRow = tbodyRef.insertRow();
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            cell1.innerHTML = val.Title;
            cell2.innerHTML = val.Description;
            cell3.innerHTML = '<img src="'+val.Link+'" title="'+val.Title+'" alt="'+val.Title+'" width="200px"/>';
            // $("#" + i).append(document.createTextNode(" - " + val));
        });

    })
}


function changeContact() {
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;
    firebase.database().ref('viewData/contact').set({
        email: email,
        mobile: mobile
    });
    document.getElementById("email").value = "";
    document.getElementById("mobile").value = "";
    $("#successData").modal("show");
}

function changeBank() {
    var bname = document.getElementById("bname").value;
    var acno = document.getElementById("acno").value;
    var ifsc = document.getElementById("ifsc").value;
    firebase.database().ref('viewData/bank').set({
        bname: bname,
        acno: acno,
        ifsc: ifsc
    });
    document.getElementById("bname").value = "";
    document.getElementById("acno").value = "";
    document.getElementById("ifsc").value = "";
    $("#successData").modal("show");
}

// function addBranch(){
//     var bloc=document.getElementById("bloc").value;
//     firebase.database().ref('viewData/branch').set({
//         branch: bloc,
//     });
// }