angular.module('bens-penhorados-filters', []).filter('vehicleCondition', function() {
    return function(goodCondition) {
        if (goodCondition === true) {
            return 'Bom/Razoável';
        }
        if (goodCondition === false) {
            return 'Mau';
        }
    }
}).filter('generateLink', function() {
    var base_url = 'http://www.e-financas.gov.pt/vendas/detalheVenda.action';
    return function(code) {
        if (code) {
            var values = code.split('.');
            return base_url + '?sf=' + values[0] + '&ano=' + values[1] + '&idVenda=' + values[2];
        }
    }
}).filter('range', function() {
    return function([], min, max) {
        var range = [];
        min = parseInt(min);
        max = parseInt(max);
        for (var i = max; i >= min; i--) {
            range.push(i);
        }
        return range;
    };
}).filter('phonenumber', function() {
    return function(number, prefix) {
        if (number) {
            number = number.toString().split(/(\d{3})/).join(' ').trim();
            return '(+' + prefix + ') ' + number;
        }
    };
}).filter('resultTitle', function() {
    return function(title) {
        if (title) {
            return title.replace(/(\d+\.\d+\.\d+\s-\s)/, '');
        }
    };
});