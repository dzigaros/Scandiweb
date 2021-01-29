let skuerror = true;
$("#sku")
    .focusout(function () {
        const skuvalue = $(this).val();
        const skulenght = skuvalue.length;
        console.log(skuvalue);
        if (skulenght > 9) {
            $(".sku_error").text("SKU can't be longer than 9 values");
            skuerror = true;
        } else {
            $(".sku_error").text("");
            skuerror = false;
        }
        if (skuvalue == '') {
            $(".sku_error").text("SKU is required field");
            skuerror = true;
        }
    });
let priceerror = true;
$("#price")
    .focusout(function () {
        const pricevalue = $(this).val();
        console.log(pricevalue);
        if (!(pricevalue.match(/(\d)[.,]\d\d$/))) {
            $(".price_error").text("Please add valid price");
            priceerror = true;

        } else {
            $(".price_error").text("");
            priceerror = false;
        }
        if (pricevalue == '') {
            $(".price_error").text("Price is required field");
            priceerror = true;
        }
    });
let nameerror = true;
$("#name")
    .focusout(function () {
        let namevalue = $(this).val();
        let namelenght = namevalue.length;
        console.log(namevalue);
        if (namelenght > 15) {
            $(".name_error").text("Please add valid product name");
            nameerror = true;
        } else {
            $(".name_error").text("");
            nameerror = false;
        }
        if (namevalue == '') {
            $(".name_error").text("Name is required field");
            nameerror = true;
        }
    });
let weigtherror = true;
$("#attributes" ) .on('focusout', '#weight', function () {
        let Weightvalue = $(this).val();
        let Weightlenght = Weightvalue.length;
        console.log(Weightvalue);
        if (Weightlenght > 3) {
            $(".weight_error").text("Please add valid product weight");
            weigtherror = true;

        } else {
            $(".weight_error").text("");
            weigtherror = false;
        }
        if (Weightvalue == '') {
            $(".weight_error").text("Weigh is required field");
            weigtherror = true;
        }
        if (!(Weightvalue.match(/^(\+|-)?(\d*\.?\d*)$/))) {
            $(".weight_error").text("Use digits");
            weigtherror = true;
        }

    });
let sizeerror = true;
$("#attributes" ) .on('focusout', '#size', function () {
        let sizevalue = $(this).val();
        console.log(sizevalue);
        if (!(sizevalue.match(/^(0|([1-9]\d*))$/))) {
            $(".size_error").text("Use digits");
            sizeerror = true;
        } else {
            $(".size_error").text("");
            sizeerror = false;
        }
        if (sizevalue == '') {
            $(".size_error").text("Size is required field");
            sizeerror = true;
        }
        if (sizevalue > 3000) {
            $(".size_error").text(" Size cant' be more then 3000MB");
            sizeerror = true;
        }

    });
let heighterror = true;
$("#attributes" ) .on('focusout', '#height', function () {

    // .focusout$(function () {
        let hvalue = $(this).val();
        console.log(hvalue);
        if (!(hvalue.match(/\d$/))) {
            $(".height_error").text("Please add valid height");
            heighterror = true;

        } else {
            $(".height_error").text("");
            heighterror = false;
        }
        if (hvalue == '') {
            $(".height_error").text("Height is required field");
            heighterror = true;
        }
        if (hvalue > 5000) {
            $(".height_error").text(" Height cant' be more then 5000CM");
            sizeerror = true;
        }
    });
let widtherror = true;
$("#attributes" ) .on('focusout', '#width', function () {
        let wvalue = $(this).val();
        console.log(wvalue);
        if (!(wvalue.match(/\d$/))) {
            $(".width_error").text("Add valid width");
            widtherror = true;

        } else {
            $(".width_error").text("");
            widtherror = false;
        }
        if (wvalue == '') {
            $(".width_error").text("Width is required field");
            widtherror = true;
        }
        if (wvalue > 5000) {
            $(".width_error").text("Width cant' be more then 5000CM");
            widtherror = true;
        }
    });
let lengtherror = true;
$("#attributes" ) .on('focusout', '#length', function () {
        let lvalue = $(this).val();
        console.log(lvalue);
        if (!(lvalue.match(/\d$/))) {
            $(".length_error").text("Please add valid length")
            lengtherror = true;

        } else {
            $(".length_error").text("");
            lengtherror = false;
        }
        if (lvalue == '') {
            $(".length_error").text("Length is required field");
            lengtherror = true;
        }
        if (lvalue > 5000) {
            $(".length_error").text("Length cant' be more then 5000CM");
            lengtherror = true;
        }
    });