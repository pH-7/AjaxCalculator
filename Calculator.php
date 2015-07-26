<?php
/**
 * @author           Pierre-Henry Soria <pierrehenrysoria@gmail.com>
 * @copyright        (c) 2015, Pierre-Henry Soria. All Rights Reserved.
 * @license          MIT License <http://www.opensource.org/licenses/mit-license.php>
 * @link             http://github.com/pH-7/
 */
class Calculator
{
	private $_iLeftOpr, $_iRightOpr, $_sSummary, $_mResult;
	
	public function __construct($sOperation, $iLeftOpr, $iRightOpr)
	{
		$this->_iLeftOpr = (int) $iLeftOpr;
		$this->_iRightOpr = (int) $iRightOpr;
		
		$this->exec($sOperation);
	}
	
	/**
	 * Return the summary & result in XML format.
	 */
	public function xmlOutput()
	{
		header('Content-Type:text/xml'); // Set the XML header
		
		/*
		 * Thanks htmlspecialchars(), I make the summary text safe for XML syntax */
		return 
		    '<output>
			    <result>' . $this->_mResult . '</result>
				<summary>' . htmlspecialchars($this->_sSummary) . '</summary>
			</output>';
	}
	
	public function result()
	{
		return $this->_mResult;
	}
	
	public function summary()
	{
		return $this->_sSummary;
	}
	
	protected function exec($sOperation)
	{
		switch ($sOperation)
		{
			case 'add':
				$this->_mResult = ($this->_iLeftOpr+$this->_iRightOpr);
				$this->_sSummary = $this->_iLeftOpr . ' + ' . $this->_iRightOpr . ' = ' . $this->_mResult;
			break;
			
			case 'subtract':
				$this->_mResult = ($this->_iLeftOpr-$this->_iRightOpr);
				$this->_sSummary = $this->_iLeftOpr . ' - ' . $this->_iRightOpr . ' = ' . $this->_mResult;
			break;
			
			case 'multiply':
				$this->_mResult = ($this->_iLeftOpr*$this->_iRightOpr);
				$this->_sSummary = $this->_iLeftOpr . ' * ' . $this->_iRightOpr . ' = ' . $this->_mResult;
			break;
			
			case 'divide':
				$this->_mResult = ($this->_iLeftOpr/$this->_iRightOpr);
				$this->_sSummary = $this->_iLeftOpr . ' / ' . $this->_iRightOpr . ' = ' . $this->_mResult;
			break;
			
			case 'logical_and':
				$this->_mResult = ($this->_iLeftOpr === $this->_iRightOpr) ? 'true' : 'false';
				$this->_sSummary = $this->_iLeftOpr . ' && ' . $this->_iRightOpr . ' = ' . $this->_mResult;
			break;
			
			case 'logical_or':
				$this->_mResult = ($this->_iLeftOpr === $this->_iRightOpr || $this->_iRightOpr === $this->_iLeftOpr) ? 'true' : 'false';
				$this->_sSummary = $this->_iLeftOpr . ' || ' . $this->_iRightOpr . ' = ' . $this->_mResult;
			break;
			
			case 'power':
				$this->_mResult = ($this->_iLeftOpr^$this->_iRightOpr);
				$this->_sSummary = $this->_iLeftOpr . ' ^ ' . $this->_iRightOpr . ' = ' . $this->_mResult;
			break;
			
			default:
				throw new InvalidArgumentException(sprintf('"%s" is an invalid operation.', str_replace('_', '', $sOperation)));
		}		
	}
		
}