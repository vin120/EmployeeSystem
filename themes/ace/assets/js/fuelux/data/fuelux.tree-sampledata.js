var DataSourceTree = function(options) {
	this._data 	= options.data;
	this._delay = options.delay;
}

DataSourceTree.prototype.data = function(options, callback) {
	var self = this;
	var $data = null;

	if(!("name" in options) && !("type" in options)){
		$data = this._data;//the root tree
		callback({ data: $data });
		return;
	}
	else if("type" in options && options.type == "folder") {
		if("additionalParameters" in options && "children" in options.additionalParameters)
			$data = options.additionalParameters.children;
		else $data = {}//no data
	}
	
	if($data != null)//this setTimeout is only for mimicking some random delay
		setTimeout(function(){callback({ data: $data });} , parseInt(Math.random() * 500) + 200);

	//we have used static data here
	//but you can retrieve your data dynamically from a server using ajax call
	//checkout examples/treeview.html and examples/treeview.js for more info
};
    var myAjax = {
        // XMLHttpRequest IE7+, Firefox, Chrome, Opera, Safari ；  ActiveXObject IE6, IE5
        xhr: window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'),
        get: function (url, callback) {
            this.xhr.open('get', url);
            this.onreadystatechange(callback, this.xhr);
            this.xhr.send(null);        
        },
        post: function (url, data, callback) {
            this.xhr.open('post', url, false);
            this.xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            this.onreadystatechange(callback, this.xhr);
            this.xhr.send(data);
        },
        onreadystatechange: function (func, _xhr) {
            _xhr.onreadystatechange = function () {
                if (_xhr.readyState == 4) {
                    if (_xhr.status == 200) {
                        func(_xhr.responseText);
                    }
                }
            }
        }
    }
    var tree_data;
    myAjax.post('menu_permissionajax', 'pid=0' , function (data) {
        if (data){
            obj= $.parseJSON(data);
            var a='';
            $.each(obj, function(i,item){
                a += "'"+item['role_name']+"' : {name:'"+item['role_name']+"', type:'folder', id:'"+item['menu_id']+"'},";
            });
            tree_data = '{'+a+'}';
        }
    });
    alert(tree_data);
    var treeDataSource = new DataSourceTree({data: tree_data});
//    var a='';
//    $.each(obj, function(i,item){
//        a += "'"+item['role_name']+"' : {name:'"+item['role_name']+"', type:'folder', id:'"+item['menu_id']+"'},";
//    });
//    var tree_data = a;
//tree_data['for-sale']['additionalParameters'] = {
//	'children' : {
//		'appliances' : {name: 'Appliances', type: 'item'},
//		'arts-crafts' : {name: 'Arts & Crafts', type: 'item'},
//		'clothing' : {name: 'Clothing', type: 'item'},
//		'computers' : {name: 'Computers', type: 'item'},
//		'jewelry' : {name: 'Jewelry', type: 'item'},
//		'office-business' : {name: 'Office & Business', type: 'item'},
//		'sports-fitness' : {name: 'Sports & Fitness', type: 'item'}
//	}
//}
//tree_data['vehicles']['additionalParameters'] = {
//	'children' : {
//		'cars' : {name: 'Cars', type: 'folder'},
//		'motorcycles' : {name: 'Motorcycles', type: 'item'},
//		'boats' : {name: 'Boats', type: 'item'}
//	}
//}
//tree_data['vehicles']['additionalParameters']['children']['cars']['additionalParameters'] = {
//	'children' : {
//		'classics' : {name: 'Classics', type: 'item'},
//		'convertibles' : {name: 'Convertibles', type: 'item'},
//		'coupes' : {name: 'Coupes', type: 'item'},
//		'hatchbacks' : {name: 'Hatchbacks', type: 'item'},
//		'hybrids' : {name: 'Hybrids', type: 'item'},
//		'suvs' : {name: 'SUVs', type: 'item'},
//		'sedans' : {name: 'Sedans', type: 'item'},
//		'trucks' : {name: 'Trucks', type: 'item'}
//	}
//}
//
//tree_data['rentals']['additionalParameters'] = {
//	'children' : {
//		'apartments-rentals' : {name: 'Apartments', type: 'item'},
//		'office-space-rentals' : {name: 'Office Space', type: 'item'},
//		'vacation-rentals' : {name: 'Vacation Rentals', type: 'item'}
//	}
//}
//tree_data['real-estate']['additionalParameters'] = {
//	'children' : {
//		'apartments' : {name: 'Apartments', type: 'item'},
//		'villas' : {name: 'Villas', type: 'item'},
//		'plots' : {name: 'Plots', type: 'item'}
//	}
//}
//tree_data['pets']['additionalParameters'] = {
//	'children' : {
//		'cats' : {name: 'Cats', type: 'item'},
//		'dogs' : {name: 'Dogs', type: 'item'},
//		'horses' : {name: 'Horses', type: 'item'},
//		'reptiles' : {name: 'Reptiles', type: 'item'}
//	}
//}


