import Vue from "vue";
import moment from "moment";
import accounting from "accounting";

Vue.filter("time", function(value) {
  return moment(value).format("LT");
});

Vue.filter("date", function(value) {
  return moment(value).format("L");
});

Vue.filter("empty", function(value) {
  if (!!value) return value;
  return "-";
});


Vue.filter("currency", function(value) {
  if (value >= 0) return accounting.formatMoney(value);
  else if (!!value) return accounting.formatMoney(Math.abs(value));
  else return accounting.formatMoney(0, "- $ ");
});

Vue.filter("dollars", function(value) {
  if (value >= 0) return accounting.formatMoney(value) + " USD";
  else if (!!value) return accounting.formatMoney(Math.abs(value)) + " USD";
  else return accounting.formatMoney(0, "- $ ");
});

Vue.filter("datetime", function(value) {
  return moment(value)
    .format("DD/MMM/YYYY h:mm A")
    .toUpperCase()
    .replace(".", "");
});
Vue.filter("percent", function(value) {
  return accounting.formatNumber(value, 1) + " %";
});
Vue.filter("number", function(value, number = 2) {
  return accounting.formatNumber(value, number);
});
Vue.filter("kmnumber", function(value) {
  if (value > 999 && value < 1000000) {
    return accounting.formatNumber(value / 1000, 2) + "K";
  } else {
    if (value > 999999) {
      return accounting.formatNumber(value / 1000000, 2) + "M";
    } else {
      return accounting.formatNumber(value, 2);
    }
  }
});

Vue.filter("phone", function(phone) {
  if (phone == null || phone == "" || phone == undefined) return "";
  return phone.replace(/[^0-9]/g, "").replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2-$3");
});

Vue.filter('date', function(value) {
  if (value) {
    return moment(String(value)).format('DD/MMM/YYYY h:mm a').toUpperCase()
    .replace(".", "");
  }
});

Vue.filter('dateSerie', function(value) {
  if (value) {
    return moment.utc(String(value)).format('DD/MMM/YYYY').toUpperCase()
    .replace(".", "");
  }
});


Vue.filter('birthdate', function(value) {
  if (value) {
    return moment(String(value)).format('DD/MMM/YYYY').toUpperCase()
    .replace(".", "");
  }
});

Vue.filter('yearsold', function(value) {
  if (value) {
    value = moment(value,'YYYY/MM/DD').format('YYYY-MM-DD');
    return moment().diff(value, 'years') + ' años';
  }
});

Vue.filter("money", function(value) {
  if (!!value) return accounting.formatMoney(value);
  else return accounting.formatMoney(0, "- $ ");
});

Vue.filter("renderPrice", function (value) {
    let price = 0;
    if (value.is_iva == 1) { //NO TASA IVA
      price = value.price_sale
    }else if (value.is_iva_in_price == 0) {//MOSTRARA EL PRECIO ANTES DE IVA
      price = value.price_sale / 1.16
    } else {//SE SUMA IVA AL PRECIO DE SALIDA EN LA FACTURA
      price = value.price_sale
    }
    if (price >= 0) return accounting.formatMoney(price) + ' ' + value.currency;
    else if (!!price) return accounting.formatMoney(Math.abs(price)) + ' ' + value.currency;
    else return accounting.formatMoney(0, "- $ ");  
});

Vue.filter("renderPriceIva", function (value) {
    let price = 0;
    if (value.is_iva == 1) { //NO TASA IVA
      price = value.price_sale
    }else if (value.is_iva_in_price == 0) {//MOSTRARA EL PRECIO ANTES DE IVA
      price = value.price_sale
    } else {//SE SUMA IVA AL PRECIO DE SALIDA EN LA FACTURA
      price = value.price_sale * 1.16
    }
    if (price >= 0) return accounting.formatMoney(price) + ' ' + value.currency;
    else if (!!price) return accounting.formatMoney(Math.abs(price)) + ' ' + value.currency;
    else return accounting.formatMoney(0, "- $ ");  
});

Vue.filter("renderPriceFinalUsd", function (value) {
    let price = 0;
    if (value.is_iva == 1) { //NO TASA IVA
      price = value.price_sale
    }else if (value.is_iva_in_price == 0) {//MOSTRARA EL PRECIO ANTES DE IVA
      price = value.price_sale
    } else {//SE SUMA IVA AL PRECIO DE SALIDA EN LA FACTURA
      price = value.price_sale * 1.16
    }
    price = price * value.type_change_usd;
    if (price >= 0) return accounting.formatMoney(price) + ' MXN';
    else if (!!price) return accounting.formatMoney(Math.abs(price)) + ' MXN';
    else return accounting.formatMoney(0, "- $ ");  
});