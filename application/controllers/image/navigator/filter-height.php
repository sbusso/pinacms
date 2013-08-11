<?php
/*
* PinaCMS
*
* THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
* "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
* LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
* A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
* OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
* SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
* LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
* DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
* THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
* (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
* OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*
* @copyright © 2010 Dobrosite ltd.
*/
if (!defined('PATH')){ exit; }



	require_once PATH_TABLES .'image.php';

	$imageGateway = new ImageGateway();
	$imageHeight = $imageGateway->findFilter('height');
	/*if(is_array($imageHeight) && count($imageHeight))
	{
		$imageHeightFilters = array();
		foreach($imageHeight as $height)
		{
			$imageHeightFilters[] = array(
				'value' => $height,
				'caption' => $height
			);
		}
		$imageHeightFilters[] = array(
			'value' => '*', 
			'caption' => lng('filter_all')
		);
		$request->result('image_height_filters', $imageHeightFilters);
	}*/

	$request->result('from', $imageGateway->reportMinField('image_height'));
	$request->result('to', $imageGateway->reportMaxField('image_height'));

	$request->setLayout('admin');
	$request->ok();