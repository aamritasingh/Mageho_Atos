<?php
/*
 * Mageho
 * Ilan PARMENTIER
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0) that is available
 * through the world-wide-web at this URL: http://www.opensource.org/licenses/OSL-3.0
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to contact@mageho.com so we can send you a copy immediately.
 *
 * @category     Mageho
 * @package     Mageho_Atos
 * @author       Mageho, Ilan PARMENTIER <contact@mageho.com>
 * @copyright   Copyright (c) 2015  Mageho (http://www.mageho.com)
 * @license      http://www.opensource.org/licenses/OSL-3.0  Open Software License (OSL 3.0)
 */

class Mageho_Atos_Model_Api_Response extends Mageho_Atos_Model_Config
{
	protected $_error = false;
	protected $_debug;
	
	/* Response label from bank */
	const RESPONSE_AUTHORIZATION_ACCEPTED = 'Authorization accepted';
	const RESPONSE_PERMISSION_DENIED = 'Permission denied';
	const RESPONSE_INVALID_TRANSACTION = 'Invalid transaction';
	const RESPONSE_PAYMENT_CANCELED_CUSTOMER = 'Payment canceled by the customer';
	const RESPONSE_FORMAT_ERROR = 'Format error';
	const RESPONSE_NUMBER_ATTEMPTS_CREDIT_CARD_NUMBER_EXCEEDED = 'Number of attempts to enter the card number exceeded';
	const RESPONSE_SECURITY_RULES_NOT_RESPECTED = 'Safety rules not followed, arrested transaction';
	const RESPONSE_SERVICE_TEMPORARILY_UNAVAILABLE = 'Service temporarily unavailable';
	const RESPONSE_TRANSACTION_ALREADY_REGISTERED = 'Transaction already registered';
	
	/* Response label from paypal */
	const PAYPAL_RESPONSE_AUTHORIZATION_ACCEPTED = 'PayPal authorization accepted';
	const PAYPAL_RESPONSE_PERMISSION_DENIED = 'PayPal permission denied';
	const PAYPAL_RESPONSE_BANK_INVALID_REQUEST = 'PayPal invalid request - Bank side problem';
	const PAYPAL_RESPONSE_PAYPAL_INVALID_REQUEST = 'PayPal invalid request - Paypal side problem';
	const PAYPAL_RESPONSE_OPERATION_IMPOSSIBLE = 'Operation impossible - Expired transaction';
	const PAYPAL_RESPONSE_PROHIBITED_TRANSACTION = 'PayPal prohibited transaction';
	const PAYPAL_RESPONSE_NSF_ACCOUNT = 'NSF Account';
	const PAYPAL_RESPONSE_TEMPORARILY_UNAVAILABLE = 'PayPal service temporarily unavailable';
	const PAYPAL_RESPONSE_FAILED_CONNECTION = 'Connection to PayPal failed';
	const PAYPAL_RESPONSE_FIELD_APPLICATION_ALREADY_USED = 'One of the fields of the application is already used for another transaction';
	const PAYPAL_RESPONSE_TECHNICAL_ERROR = 'Technical error';
	
	/* Bank response label */
	const BANK_RESPONSE_SUCCESS = 'Transaction approved or successfully treated';
    const BANK_RESPONSE_EXCEEDING_AUTHORIZED = 'Exceeding the authorized ceiling on the map';
    const BANK_RESPONSE_INVALID_MERCHANT_ID = 'Invalid merchant id or e-commerce contract nonexistent';
    const BANK_RESPONSE_KEEP_CREDIT_CARD = 'Keep the credit card';
    const BANK_RESPONSE_SEVERAL_REJECT_ISSUES_POSSIBLE = 'Possible reasons: incorrect validity date, new map not yet initialized by a withdrawal in an ATM service e-carte bleue active ...). Please try again. In case of persistent failure, please contact your bank.';
    const BANK_RESPONSE_KEEP_CREDIT_CARD_SPECIAL_CONDITIONS = 'Keep the credit card, special conditions';
    const BANK_RESPONSE_APPROVED_AFTER_IDENFICATION = 'Approved after identification';
    const BANK_RESPONSE_CHECK_REQUEST_PARAMS = 'Check transfer parameters of the request';
    const BANK_RESPONSE_INVALID_AMOUNT = 'Invalid amount';
    const BANK_RESPONSE_INVALID_NUMBER_CREDIT_CARD_CARDHOLDER = 'Number cardholder invalid credit';
    const BANK_RESPONSE_CREDIT_CARD_ISSUER_UNKNOWN = 'Credit card issuer unknown';
    const BANK_RESPONSE_FORMAT_ERROR = 'Format error';
    const BANK_RESPONSE_UNKNOWN_BUYER_ORGANIZATION = 'Unknown buyer organization';
    const BANK_RESPONSE_EXPIRY_DATE_EXCEEDED = 'Expiry date of the credit card exceeded';
    const BANK_RESPONSE_SUSPECTED_FRAUD = 'Suspected fraud';
    const BANK_RESPONSE_CREDIT_CARD_LOST = 'Lost credit card';
    const BANK_RESPONSE_CREDIT_CARD_STOLEN = 'Stolen credit card';
    const BANK_RESPONSE_INSUFFICIENT_FUNDS_OR_CREDIT_EXCEEDED = 'Insufficient funds or credit exceeded';
    const BANK_RESPONSE_EXPIRY_DATE_INCORRECT = 'Expiry date of the credit card incorrect';
	const BANK_RESPONSE_CREDIT_CARD_MISSING_FILE = 'Credit card missing file';
	const BANK_RESPONSE_UNAUTHORIZED_TRANSACTION_HOLDER = 'Unauthorized transaction such holder';
	const BANK_RESPONSE_PROHIBITED_TRANSACTION_TERMINAL = 'Prohibited transaction terminal';
    const BANK_RESPONSE_ACCEPTOR_CREDIT_CARD_SHOULD_CONTACT_BUYER = 'The acceptor credit card should contact the buyer';
    const BANK_RESPONSE_EXCEEDED_LIMIT_AMOUNT_WITHDRAWAL = ' Exceeded the limit of the amount of withdrawal';
    const BANK_RESPONSE_SAFETY_RULES_NOT_RESPECTED = 'Safety rules are not respected';
    const BANK_RESPONSE_NOT_RECEIVED_RECEIVED_TOO_LATE = 'Response not received or received too late';
    const BANK_RESPONSE_NUMBER_OF_ATTEMPS_EXCEEDED_CREDIT = 'Number of attempts to enter the card number exceeded credit';
    const BANK_RESPONSE_TRY_AGAIN_LATER = 'Please try again later';
    const BANK_RESPONSE_TRANSMITTER_INACCESSIBLE_CARDS = 'Transmitter inaccessible cards';
    const BANK_RESPONSE_TWO_TIMES_TO_CONFIRM_YOUR_PAYMENT = 'If you click two times to confirm your payment: ignore this warning and check your email to see if your order has been confirmed';
    const BANK_RESPONSE_SYSTEM_MALFUNCTION = 'System malfunction';
    const BANK_RESPONSE_DEADLINE_DELAY_GLOBAL_SURVEILLANCE = 'Deadline for the delay global surveillance';
    const BANK_RESPONSE_SERVER_UNAVAILABLE_NETWORK = 'Server unavailable network routing application again';
    const BANK_RESPONSE_INCIDENT_DOMAIN_INITIATOR = 'Incident domain initiator';
	
	/* CVV response label from bank */
	const CVV_RESPONSE_INCORRECT = 'Incorrect CVV';
	const CVV_RESPONSE_NO_DATA = 'No data on CVV';
	const CVV_RESPONSE_TREATED = 'Proper control number';
	const CVV_RESPONSE_UNTREATED = 'Number of control untreated';
	const CVV_RESPONSE_MISSING = 'The control number is missing from the request for authorization';
	const CVV_RESPONSE_BANK_NO_CERTIFIED = 'The Bank is not certified, the control has not been made.';
	const CVV_RESPONSE_NO_CVV_ON_CREDIT_CARD = 'No cryptogram on the credit card';
	
	/* Complementary code */
	const COMPLEMENTARY_CODE_ALL_SUCCESS = 'All controls that you joined to are performed successfully';
	const COMPLEMENTARY_CODE_NO_AUTHORIZED_CREDIT = 'The credit card used is not made after the authorized credit';
	const COMPLEMENTARY_CODE_GRAY_LIST = 'The card used belongs to the gray list of merchant';
	const COMPLEMENTARY_CODE_UNREFERENCED_RANGE = 'The bit of the card used belongs to an unreferenced range in the table of binary banking platform';
	const COMPLEMENTARY_CODE_NOT_SAME_NATIONALITY = 'The card number is not in range of the same nationality as the merchant';
	const COMPLEMENTARY_CODE_PROBLEM_ADDITIONAL_LOCAL_CONTROLS = 'The bank server has a problem when processing an additional local controls';
	
	/* Transaction condition */
	const TRANSACTION_CONDITION_3D_SUCCESS = 'The merchant and the cardholder is enrolled in the 3-D Secure program and the holder is authenticated correctly';
	const TRANSACTION_CONDITION_3D_FAILURE = 'The merchant and the cardholder is enrolled in the 3-D Secure program but the buyer has failed to authenticate (bad password)';
	const TRANSACTION_CONDITION_3D_ERROR = 'The trader involved in the 3-D Secure program but the payment server encountered a technical problem during the authentication process (when checking registration card 3D program or holder authentication)';
	const TRANSACTION_CONDITION_3D_NOTENROLLED = "The trader involved in the 3-D Secure program but the wearer's card is not enrolled";
	const TRANSACTION_CONDITION_3D_ATTEMPT = 'The merchant and the cardholder is enrolled in the 3-D Secure program but the buyer did not have to authenticate (the bank access control server that issued the card does not implement the generation of proof of authentication attempt)';
	const TRANSACTION_CONDITION_SSL = 'The buyer has not authenticated to one of the following reasons: 1- The type of card is not supported by the program 3-D Secure 2- The merchant or the cardholder is not enrolled in the program 3-D Secure';
	
	/*
		API ERROR : Error reading pathfile (no key word F_DEFAULT)
		
		Cette erreur est d�e au chemin d'acc�s sur les serveurs UNIX qui est limit� � 76 caract�res.
		Essayer en ligne de commande ln ou remonter le dossier de plusieurs niveaux
		
		Exemple ligne de commande :
		ln -s /home/mondossier /var/www/vhost/mondomaine.fr/httpdocs/lib/atos 
		Ensuite vous pourrez vous servir de /home/mondossier/fichier.txt comme s'il se trouvait dans le dossier /var/www/vhost/mondomaine.fr/httpdocs/lib/atos/fichier.txt. 
	*/
    public function doResponse($data)
    {
		try {
			if (! function_exists('shell_exec')) {
				throw new Exception(Mage::helper('atos')->__("shell_exec php function doesn't exist or is disabled for security purpose."));
			}
			if (! preg_match(':^[a-zA-Z0-9]+$:', $data)) {
            	throw new Exception(Mage::helper('atos')->__('REQUEST DATA not valid. (%s)', $data));
			}
			
			$pathBinResponse = $this->getConfig()->bin_response;

			$command = sprintf('pathfile=%s message=%s', $this->getApiFiles()->getPathfileName(), escapeshellcmd($data));
			
			$response = shell_exec("$pathBinResponse $command 2>&1");
			$hash = $this->hash($response);
	
			/* Error from server bank response */
			if ( ! isset($hash['code']) || (isset($response['code']) && $response['code'] != 0) ) {
				throw new Exception(Zend_Debug::dump($hash, 'atos', false));
			}
			
			return $hash;
		} catch (Exception $e) {
			
			$this->setError(true)
				->setDebug($e->getMessage());
			
			Mage::getSingleton('atos/debug')->debugData($e->getMessage());
			Mage::helper('checkout')->sendPaymentFailedEmail($this->getQuote(), $e->getMessage());
		}
    }

	public function hash($response_raw)
	{
	    $response = explode('!', $response_raw);
		
        $hash = array(
			'code' => $response[1],
			'error' => $response[2],
			'merchant_id' => $response[3],
			'merchant_country' => $response[4],
			'amount' => $response[5],
			'transaction_id' => $response[6],
			'payment_means' => $response[7],
			'transmission_date' => $response[8],
			'payment_time' => $response[9],
			'payment_date' => $response[10],
			'response_code' => $response[11],
			'payment_certificate' => $response[12],
			'authorisation_id' => $response[13],
			'currency_code' => $response[14],
			'card_number' => $response[15],
			'cvv_flag' => $response[16],
			'cvv_response_code' => $response[17],
			'bank_response_code' => $response[18],
			'complementary_code' => $response[19],
			'complementary_info' => $response[20],
			'return_context' => $response[21],
			'caddie' => $response[22], // unavailable with NO_RESPONSE_PAGE
			'receipt_complement' => $response[23],
			'merchant_language' => $response[24], // unavailable with NO_RESPONSE_PAGE
			'language' => $response[25],
			'customer_id' => $response[26], // unavailable with NO_RESPONSE_PAGE
			'order_id' => $response[27],
			'customer_email' => $response[28], // unavailable with NO_RESPONSE_PAGE
			'customer_ip_address' => $response[29], // unavailable with NO_RESPONSE_PAGE
			'capture_day' => $response[30],
			'capture_mode' => $response[31],
			'data' => $response[32],
			'order_validity' => $response[33],
			'transaction_condition' => $response[34],
			'statement_reference' => $response[35],
			'card_validity' => $response[36],
			'score_value' => $response[37],
			'score_color' => $response[38],
			'score_info' => $response[39],
			'score_threshold' => $response[40],
			'score_profile' => $response[41],
			'response_raw' => $response_raw
		);
		
		if (empty($hash['customer_ip_address'])) {
			$hash['customer_ip_address'] = Mage::helper('core/http')->getRemoteAddr(false);
		}
		
		if (empty($hash['payment_time'])) {
			$hash['payment_time'] = date('H:i:s');
		}
		
		if (empty($hash['payment_date'])) {
			$hash['payment_date'] = date('Y-m-d');
		}
		
		return $hash;
	}
	
	/**
     * R�cup�re le libell� des codes r�ponse renvoy�s par le serveur bancaire dans le champ response_code 
     * (cf Annexe G du Dictionnaire des donn�es de l'API Sogenactif, Mercanet)
     *
     * @return string
     */
	public function getResponseLabel($response) 
	{
		$responseCode = $response['response_code'];
		$bankResponseCode = $response['bank_response_code'];
		$paymentMeans = $response['payment_means'];
		
		Mage::log($responseCode);
		
		$hlpr = Mage::helper('atos');
		
		if ($paymentMeans == 'PAYPAL')
		{
			if ($bankResponseCode == '00' && $responseCode == '00') {
				return $hlpr->__(self::PAYPAL_RESPONSE_AUTHORIZATION_ACCEPTED);
			} elseif ($bankResponseCode == '05' && $responseCode == '05') {
				return $hlpr->__(self::PAYPAL_RESPONSE_PERMISSION_DENIED);
			} elseif ($bankResponseCode == '' && $responseCode == '12') {
				return $hlpr->__(self::PAYPAL_RESPONSE_BANK_INVALID_REQUEST);
			} elseif ($bankResponseCode == '12' && $responseCode == '12') {
				return $hlpr->__(self::PAYPAL_RESPONSE_PAYPAL_INVALID_REQUEST);
			} elseif ($bankResponseCode == '24' && $responseCode == '05') {
				return $hlpr->__(self::PAYPAL_RESPONSE_OPERATION_IMPOSSIBLE);
			} elseif ($bankResponseCode == '40' && $responseCode == '05') {
				return $hlpr->__(self::PAYPAL_RESPONSE_PROHIBITED_TRANSACTION);
			} elseif ($bankResponseCode == '51' && $responseCode == '05') {
				return $hlpr->__(self::PAYPAL_RESPONSE_NSF_ACCOUNT);
			} elseif ($bankResponseCode == '90' && $responseCode == '90') {
				return $hlpr->__(self::PAYPAL_RESPONSE_TEMPORARILY_UNAVAILABLE);
			} elseif ($bankResponseCode == '' && $responseCode == '90') {
				return $hlpr->__(self::PAYPAL_RESPONSE_FAILED_CONNECTION);
			} elseif ($bankResponseCode == '94' && $responseCode == '05') {
				return $hlpr->__(self::PAYPAL_RESPONSE_FIELD_APPLICATION_ALREADY_USED);
			} elseif ($bankResponseCode == '' && $responseCode == '99') {
				return $hlpr->__(self::PAYPAL_RESPONSE_TECHNICAL_ERROR);
			}
		}
		
		switch ($responseCode) 
		{
			case '00':
				return $hlpr->__(self::RESPONSE_AUTHORIZATION_ACCEPTED);
			case '02':
			case '03':
			case '05':
			case '34':
				return $hlpr->__(self::RESPONSE_PERMISSION_DENIED);
			case '12':
				return $hlpr->__(self::RESPONSE_INVALID_TRANSACTION);
			case '17':
				return $hlpr->__(self::RESPONSE_PAYMENT_CANCELED_CUSTOMER);
			case '30':
				return $hlpr->__(self::RESPONSE_FORMAT_ERROR);
			case '75':
				return $hlpr->__(self::RESPONSE_NUMBER_ATTEMPTS_CREDIT_CARD_NUMBER_EXCEEDED);
			case '63':
				return $hlpr->__(self::RESPONSE_SECURITY_RULES_NOT_RESPECTED);
			case '90':
				return $hlpr->__(self::RESPONSE_SERVICE_TEMPORARILY_UNAVAILABLE);
			case '94':
				return $hlpr->__(self::RESPONSE_TRANSACTION_ALREADY_REGISTERED);
				break;
			default:
				return $responseCode;
				break;
		}
	}

	/**
     * R�cup�re libell� des codes r�ponse renvoy�s par le serveur Sogenactif dans le champ bank_response_code(cf Annexe F du Dictionnaire des donn�es de l'API Sogenactif)
     *
     * @return string
     */
	public function getBankResponseLabel($response) 
	{
		$bankResponseCode = $response['bank_response_code'];
		
		$hlpr = Mage::helper('atos');
		switch ($bankResponseCode) 
		{
			case '00':	return $hlpr->__(self::BANK_RESPONSE_SUCCESS);
			case '02':	return $hlpr->__(self::BANK_RESPONSE_EXCEEDING_AUTHORIZED);
			case '03':	return $hlpr->__(self::BANK_RESPONSE_INVALID_MERCHANT_ID);
			case '04':	return $hlpr->__(self::BANK_RESPONSE_KEEP_CREDIT_CARD);
			case '05':	return $hlpr->__(self::BANK_RESPONSE_SEVERAL_REJECT_ISSUES_POSSIBLE);
			case '07':	return $hlpr->__(self::BANK_RESPONSE_KEEP_CREDIT_CARD_SPECIAL_CONDITIONS);
			case '08':	return $hlpr->__(self::BANK_RESPONSE_APPROVED_AFTER_IDENFICATION);
			case '12':	return $hlpr->__(self::BANK_RESPONSE_CHECK_REQUEST_PARAMS);
			case '13':	return $hlpr->__(self::BANK_RESPONSE_INVALID_AMOUNT);
			case '14':	return $hlpr->__(self::BANK_RESPONSE_INVALID_NUMBER_CREDIT_CARD_CARDHOLDER);
			case '15':	return $hlpr->__(self::BANK_RESPONSE_CREDIT_CARD_ISSUER_UNKNOWN);
			case '30':	return $hlpr->__(self::BANK_RESPONSE_FORMAT_ERROR);
			case '31':	return $hlpr->__(self::BANK_RESPONSE_UNKNOWN_BUYER_ORGANIZATION);
			case '33':	return $hlpr->__(self::BANK_RESPONSE_EXPIRY_DATE_EXCEEDED);
			
			case '59':
			case '34':
				return $hlpr->__(self::BANK_RESPONSE_SUSPECTED_FRAUD);
				
			case '41':	return $hlpr->__(self::BANK_RESPONSE_CREDIT_CARD_LOST);
			case '43':	return $hlpr->__(self::BANK_RESPONSE_CREDIT_CARD_STOLEN);
			case '51':	return $hlpr->__(self::BANK_RESPONSE_INSUFFICIENT_FUNDS_OR_CREDIT_EXCEEDED);
			case '54':	return $hlpr->__(self::BANK_RESPONSE_EXPIRY_DATE_INCORRECT);
			case '56':	return $hlpr->__(self::BANK_RESPONSE_CREDIT_CARD_MISSING_FILE);
			case '57':	return $hlpr->__(self::BANK_RESPONSE_UNAUTHORIZED_TRANSACTION_HOLDER);
			case '58':	return $hlpr->__(self::BANK_RESPONSE_PROHIBITED_TRANSACTION_TERMINAL);
			case '60':	return $hlpr->__(self::BANK_RESPONSE_ACCEPTOR_CREDIT_CARD_SHOULD_CONTACT_BUYER);
			case '61':	return $hlpr->__(self::BANK_RESPONSE_EXCEEDED_LIMIT_AMOUNT_WITHDRAWAL);
			case '63':	return $hlpr->__(self::BANK_RESPONSE_SAFETY_RULES_NOT_RESPECTED);
			case '68':	return $hlpr->__(self::BANK_RESPONSE_NOT_RECEIVED_RECEIVED_TOO_LATE);
			case '75':	return $hlpr->__(self::BANK_RESPONSE_NUMBER_OF_ATTEMPS_EXCEEDED_CREDIT);
			case '90':	return $hlpr->__(self::BANK_RESPONSE_TRY_AGAIN_LATER);
			case '91':	return $hlpr->__(self::BANK_RESPONSE_TRANSMITTER_INACCESSIBLE_CARDS);
			case '94':	return $hlpr->__(self::BANK_RESPONSE_TWO_TIMES_TO_CONFIRM_YOUR_PAYMENT);
			case '96':	return $hlpr->__(self::BANK_RESPONSE_SYSTEM_MALFUNCTION);
			case '97':	return $hlpr->__(self::BANK_RESPONSE_DEADLINE_DELAY_GLOBAL_SURVEILLANCE);
			case '98':	return $hlpr->__(self::BANK_RESPONSE_SERVER_UNAVAILABLE_NETWORK);
			case '99':	return $hlpr->__(self::BANK_RESPONSE_INCIDENT_DOMAIN_INITIATOR);
			default:
				if (isset($bankResponseCode)) {
					return $bankResponseCode;
				}
				break;
		}
	}

	/**
     * R�cup�re libell� des codes r�ponse renvoy�s par le serveur bancaire dans le champ cvv_response_code 
     * (cf Annexe B du Dictionnaire des donn�es de l'API Sogenactif, Mercanet)
     *
     * @return string
     */
	public function getCvvResponseLabel($response) 
	{
		$cvvResponseCode = $response['cvv_response_code'];
		
		$hlpr = Mage::helper('atos');
		switch ($cvvResponseCode) {
			case '4E':
			case '':
				return $hlpr->__(self::CVV_RESPONSE_INCORRECT);
			case '??':
				return $hlpr->__(self::CVV_RESPONSE_NO_DATA);
			case '4D':
				return $hlpr->__(self::CVV_RESPONSE_TREATED);
			case '50':
				return $hlpr->__(self::CVV_RESPONSE_UNTREATED);
			case '53':
				return $hlpr->__(self::CVV_RESPONSE_MISSING);
			case '55':
				return $hlpr->__(self::CVV_RESPONSE_BANK_NO_CERTIFIED);
			case 'NO':
				return $hlpr->__(self::CVV_RESPONSE_NO_CVV_ON_CREDIT_CARD);
			default:
				if (isset($cvvResponseCode)) {
					return $cvvResponseCode;
				}
				break;
		}
	}
	
	/**
     * @return string
     */
	public function getComplementaryCode($response)
	{
		$complementaryCode = $response['complementary_code'];
		
		$hlpr = Mage::helper('atos');
		switch ($complementaryCode) 
		{
			case '00':
				return $hlpr->__(self::COMPLEMENTARY_CODE_ALL_SUCCESS);
			case '02':
				return $hlpr->__(self::COMPLEMENTARY_CODE_NO_AUTHORIZED_CREDIT);
			case '03':
				return $hlpr->__(self::COMPLEMENTARY_CODE_GRAY_LIST);
			case '05':
				return $hlpr->__(self::COMPLEMENTARY_CODE_UNREFERENCED_RANGE);
			case '06':
				return $hlpr->__(self::COMPLEMENTARY_CODE_NOT_SAME_NATIONALITY);
			case '99':
				return $hlpr->__(self::COMPLEMENTARY_CODE_PROBLEM_ADDITIONAL_LOCAL_CONTROLS);
			default:
				if (isset($complementaryCode)) {
					return $complementaryCode;
				}
				break;
	    }
	}
	
	/**
     * @return string
     */
	public function getTransactionConditionLabel($response)
	{
		$transactionCondition = $response['transaction_condition'];
		
		$hlpr = Mage::helper('atos');
		switch ($transactionCondition) 
		{
			case '3D_SUCCESS':
				return $hlpr->__(self::TRANSACTION_CONDITION_3D_SUCCESS);
			case '3D_FAILURE':
				return $hlpr->__(self::TRANSACTION_CONDITION_3D_FAILURE);
			case '3D_ERROR':
				return $hlpr->__(self::TRANSACTION_CONDITION_3D_ERROR);
			case '3D_NOTENROLLED':
				return $hlpr->__(self::TRANSACTION_CONDITION_3D_NOTENROLLED);
			case '3D_ATTEMPT':
				return $hlpr->__(self::TRANSACTION_CONDITION_3D_ATTEMPT);
			case 'SSL':
				return $hlpr->__(self::TRANSACTION_CONDITION_SSL);
			default:
				if (isset($transactionCondition)) {
					return $transactionCondition;
				}
				break;
	    }
	}
	
	public function paymentN(array $hash)
	{
		if (isset($hash['data'], $hash['capture_mode']) && $hash['capture_mode'] == 'PAYMENT_N')
		{
			$return = array();
			foreach(explode(';', $hash['data']) as $value) {
				$data = explode('=', $value);
				switch ($data[0]) {
					case 'NB_PAYMENT':
						$return['payment_n'] = $data[1];
					break;
					case 'PERIOD':
						$return['period'] = $data[1];
					break;
					case 'INITIAL_AMOUNT':
						$return['initial_amount'] = $data[1];
					break;
					case 'PAYMENT_DUE_DATES':
						$date = explode(',', $data[1]);
						$return['payment_due_dates'] = array(
							$this->formatDate($date[0]), 
							$this->formatDate($date[1]), 
							$this->formatDate($date[2])
						);
					break;
				}
			}
			return $return;
		}
	}
	
	public function formatDate($date, $format = 'medium')
	{
		if ($date = explode('/', $date)) {
			/* as follows : year-month-day */
	    	$newDate = substr($date[0], 0, 4) . '-' . substr($date[0], 4, 2) . '-' . substr($date[0], 6, 2);
	    	
			return Mage::helper('core')->formatDate($newDate, $format, false);
		}
	}
	
	public function formatAmount($amount, $currency = true)
	{
		$int = substr($amount, 0, -2);
		$decimal = substr($amount, -2);
		
		if ($currency == true) 
		{
			return Mage::helper('core')->currency($int . '.' . $decimal);
		} else {
			return $int . '.' . $decimal;
		}
	}
	
	/*
	 * Formate le num�ro de carte de cr�dit 
	 * de la r�ponse bancaire
	 *
	 * @return string
	 */
	public function getCcNumberEnc($cc)
	{
		if (isset($cc) && !empty($cc)) 
		{
			/* entr�e tableau card_number sous la forme 4978.14 */
			// $cc = @explode('.', $response['card_number']);
			
			$cc = preg_split("/\./", $cc);
			if (isset($cc[0], $cc[1])) {
			    return $cc[0] . ' #### #### ##' . $cc[1];
			}
		}
	}
	
	/*
	 * Retourne les quatre derniers num�ros 
	 * de la carte de cr�dit de la r�ponse bancaire
	 *
	 * @return string
	 */
	public function getCcLast4($cc)
	{
		if (isset($cc) && !empty($cc)) 
		{
			/* entr�e tableau card_number sous la forme 4978.14 */
			// $cc = @explode('.', $response['card_number']);
			
			$cc = preg_split("/\./", $cc);
			if (isset($cc[1])) {
			    return '##' . $cc[1];
			}
		}
	}
	
	public function setError($error)
	{
		$this->_error = $error;
		
		return $this;
	}
	
	public function getError()
	{
		return $this->_error;
	}
	
	public function setDebug($debug)
	{
		$this->_debug = $debug;
		
		return $this;
	}
	
	public function getDebug()
	{
		return $this->_debug;
	}
}