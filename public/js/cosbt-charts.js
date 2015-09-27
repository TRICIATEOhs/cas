/**
 *	Neon Charts Scripts
 *
 *	Developed by Arlind Nushi - www.laborator.co
 */

;(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{
		// Morris.js Graphs
		if(typeof Morris != 'undefined')
		{

			Morris.Line({
				element: 'chart-maa',
				data: [
					{ y: 'Jan', a: getRandomInt(10,70),  b: getRandomInt(50,100), c: getRandomInt(10,100) },
					{ y: 'Feb', a: getRandomInt(10,70),  b: getRandomInt(50,100), c: getRandomInt(10,100) },
					{ y: 'Mar', a: getRandomInt(10,70),  b: getRandomInt(50,100), c: getRandomInt(10,100) },
					{ y: 'Apr', a: getRandomInt(10,70),  b: getRandomInt(50,100), c: getRandomInt(10,100) },
					{ y: 'May', a: getRandomInt(10,70),  b: getRandomInt(50,100), c: getRandomInt(10,100) },
					{ y: 'Jun', a: getRandomInt(10,70),  b: getRandomInt(50,100), c: getRandomInt(10,100) },
					{ y: 'Jul', a: getRandomInt(10,70),  b: getRandomInt(50,100), c: getRandomInt(10,100) },
					{ y: 'Aug', a: getRandomInt(10,70),  b: getRandomInt(50,100), c: getRandomInt(10,100) },
					{ y: 'Sep', a: getRandomInt(10,70),  b: getRandomInt(50,100), c: getRandomInt(10,100) },
					{ y: 'Oct', a: getRandomInt(10,70),  b: getRandomInt(50,100), c: getRandomInt(10,100) },
					{ y: 'Nov', a: getRandomInt(10,70),  b: getRandomInt(50,100), c: getRandomInt(10,100) },
					{ y: 'Dec', a: getRandomInt(10,70),  b: getRandomInt(50,100), c: getRandomInt(10,100) }
				],
				xkey: 'y',
				ykeys: ['a', 'b', 'c'],
				labels: ['2015', '2014', '2013'],
				parseTime: false,
				lineColors: ['#D24D57', '#22A7F0', '#87D37C']
			});

			Morris.Line({
				element: 'chart-waa',
				data: [
					{ y: 'Week 1', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 2', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 3', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 4', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 5', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 6', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 7', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 8', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 9', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 10', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 11', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 12', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 13', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 14', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 15', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 17', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 18', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 19', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 20', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 21', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 22', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 23', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 24', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 25', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 26', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 27', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 28', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 29', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 30', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 31', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 32', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 33', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 34', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 35', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 36', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 37', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 38', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 39', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 40', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 41', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 42', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 43', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 44', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 45', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 46', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 47', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 48', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 49', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 50', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 51', a: getRandomInt(10,70),  b: getRandomInt(50,100) },
					{ y: 'Week 52', a: getRandomInt(10,70),  b: getRandomInt(50,100) }
				],
				xkey: 'y',
				ykeys: ['a', 'b'],
				labels: ['2014', '2013'],
				parseTime: false,
				lineColors: ['#D24D57', '#22A7F0']
			});
			
		}
		
		
		
		
	});
	
})(jQuery, window);
 
 
function getRandomInt(min, max) 
{
	return Math.floor(Math.random() * (max - min + 1)) + min;
}