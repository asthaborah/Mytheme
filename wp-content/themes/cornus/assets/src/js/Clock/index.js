( function ( $ ) {
	class Clock {
		constructor() {
			this.initializeClock();
		}

		initializeClock() {
			let t = setInterval( () => this.time(), 1000 );
		}

		numPad( str ) {
			let cStr = str.toString();
			if ( cStr.length < 2 ) str = 0 + cStr;
			return str;
		}

		time() {
			let currDate = new Date(); // getting the date
			let currSec  = currDate.getSeconds(); //getting the seconds
			let currMin  = currDate.getMinutes(); //getting the minutes
			let curr24Hr = currDate.getHours(); //getting the hours
			let ampm     = curr24Hr >= 12 ? 'pm' : 'am'; //checking if the time is am or pm
			let currHr   = curr24Hr % 12; // converting 24 hr in 12 hr 
			currHr       = currHr ? currHr : 12; //evaluating through boolean if 1 then print currHr if value is false means 0 then print 12

			let stringTime = currHr + ':' + this.numPad( currMin ) + ':' + this.numPad( currSec );
			const timeEmojiEl = $( '#time-emoji' );

			if ( curr24Hr >= 5 && curr24Hr <= 17 ) {
				timeEmojiEl.text( '🌞' );
			} else {
				timeEmojiEl.text( '🌜' );
			}

			$( '#time' ).text( stringTime );
			$( '#ampm' ).text( ampm );
		}
	}

	new Clock();
	

} )( jQuery );


