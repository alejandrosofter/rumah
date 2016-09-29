/*

Comet Chat
Copyright (c) 2009 Inscripts

Version: 1.1

Comet Chat ('the Software') is a copyrighted work of authorship. Inscripts 
retains ownership of the Software and any copies of it, regardless of the 
form in which the copies may exist. This license is not a sale of the 
original Software or any copies.

By installing and using Comet Chat on your server, you agree to the following
terms and conditions. Such agreement is either on your own behalf or on behalf
of any corporate entity which employs you or which you represent
('Corporate Licensee'). In this Agreement, 'you' includes both the reader
and any Corporate Licensee and 'Inscripts' means Inscripts (I) Private Limited:

Comet Chat license grants you the right to run one instance (a single installation)
of the Software on one web server and one web site for each license purchased.
Each license may power one instance of the Software on one domain. For each 
installed instance of the Software, a separate license is required. 
The Software is licensed only to you. You may not rent, lease, sublicense, sell,
assign, pledge, transfer or otherwise dispose of the Software in any form, on
a temporary or permanent basis, without the prior written consent of Inscripts. 

The license is effective until terminated. You may terminate it
at any time by uninstalling the Software and destroying any copies in any form. 

You undertake to; 

ensure that, prior to use of the Software by your employees or agents, all such
parties are notified of the terms of this Agreement; and hold all data 
(including object and source codes), software listings and all other information
relating to the Software confidential and not at any time, during the period of
the license or after its expiry, disclose the same whether directly or indirectly
to any third party without Inscripts' consent. 

not to use the Software for any illegal purposes and shall comply with all 
applicable legislation. 

All customers must submit the URL where they are using (or plan to use) each license.

The Software source code may be altered (at your risk) 

All Software copyright notices within design templates must remain unchanged (and visible). 

The Software may not be used for anything that would represent or is associated
with an Intellectual Property violation, including, but not limited to, 
engaging in any activity that infringes or misappropriates the intellectual property
rights of others, including copyrights, trademarks, service marks, trade secrets, 
software piracy, and patents held by individuals, corporations, or other entities. 

If any of the terms of this Agreement are violated, Inscripts reserves the right 
to revoke the Software license at any time. 

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

(function($){   
  
	$.cometchatspy = function(){

		var heartbeatTimer;
		var timeStamp = '0';		

		function chatHeartbeat(){	
			
			$.ajax({
				url: "index.php?action=spydata",
				data: {timestamp: timeStamp},
				type: 'post',
				cache: false,
				dataFilter: function(data) {
					if (typeof (JSON) !== 'undefined' && typeof (JSON.parse) === 'function')
					  return JSON.parse(data);
					else
					  return eval('(' + data + ')');
				},
				success: function(data) {
					if (data) {
						var htmlappend = '';

						$.each(data, function(type,item){
							if (type == 'timestamp') {
								timeStamp = item;
							}

							if (type == 'online') {
								$('#online').html(item);
							}

							if (type == 'messages') {
								$.each(item, function(i,incoming) {
									htmlappend = '<div class="chat"><div class="chatrequest2">'+incoming.fromu+' -> '+incoming.tou+'</div><div class="chatmessage2" >'+incoming.message+'</div><div style="clear:both"></div></div>' + htmlappend;

								});
							}
						});

						if (htmlappend != '') {
							$("#data").prepend(htmlappend);
							$('div.message').fadeIn(2000);
							$('div.message:gt(19)').remove(); 
						}
					}
					
				clearTimeout(heartbeatTimer);
				heartbeatTimer = setTimeout( function() { chatHeartbeat(); },3000);
				
			}});

		}

		chatHeartbeat();

	} 
  
})(jQuery);

