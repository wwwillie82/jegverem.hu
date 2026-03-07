<?php

/**
 * DB_Result class.  Provides an iterator wrapper
 * for working with a MySQL result.
 * @author d11wtq
 */

class DbResult implements Iterator {
	/**
	 * The ID that was created as a result
	 * of inserting a row
	 * @var int id
	 */
	private $id;
	/**
	 * The size of the resultset
	 * @var int length (num rows)
	 */
	private $length = 0;

	/**
	 * The size of the resultset without using LIMIT
	 * @var int length (num rows)
	 */
	private $found_rows = 0;

	/**
	 * The result itself
	 * @var result result
	 */
	private $result;
	/**
	 * Active database connection
	 * @var mysqli
	 */
	private $conn;
	/**
	 * DbRow Row
	 * resultset
	 * @var array row
	 */
	private $rows = array();
	/**
	 * Current position
	 * @var int position
	 */
	private $position = 0;
	/**
	 * The last position we were at when we read from the resultset
	 * @var int last position
	 */
	private $lastPosition = 0;
	/**
	 * If we have pulled out any rows or not yet
	 * @var boolean Got rows
	 */
	private $gotResult = false;
	/**
	 * The affected number of rows from the query
	 * @var int num rows
	 */
	private $affectedRows = -1;

	/**
	 * Constructor
	 * @param result result
	 * @param resource connection
	 * @param boolean insert query
	 */
	public function __construct(&$result, &$conn, $insert=false, $uselimit=false) {
		$this->result = $result;
		$this->conn = $conn;

		if ((@mysqli_num_rows($this->result) >= 0 && $this->result !== false) || $insert) {
			if ($uselimit == true) {
				$found_rows_q = mysqli_query($this->conn, "SELECT FOUND_ROWS()");
				$found_rows_ret = mysqli_fetch_array($found_rows_q);
				$this->found_rows = $found_rows_ret[0];
			}

			$this->length = (int) @mysqli_num_rows($this->result);
			$this->affectedRows = mysqli_affected_rows($conn);
			if ($insert == false) {
				/* kérdezzük le az összes sort */
				while($row = mysqli_fetch_assoc($this->result)) {
					$row_ob = new DbRow();
					$row_ob->SetFields($row);
					$this->rows[] = $row_ob;
				}
			}
		}
	}

	public function __get($n) {
		if (count($this->rows) > 0)
			return $this->rows[0]->{$n};
		else
			return false;
	}

	/**
	 * 
	 * @param <type> $n
	 * @return <type>
	 */
	public function GetIDs($n = "id") {
		$buffer = array();
		if (count($this->rows) > 0) {
			foreach($this->rows as $row)
				$buffer[] = $row->{$n};

			return $buffer;
		}
		else
			return false;
	}

	public function GetArray($single_row=true) {
		$buffer = array();
		if(count($this->rows) == 1 && $single_row==true) {
			// Only one row
			return $this->rows[0]->GetFields();
		}
		foreach($this->rows as $row) {
			$buffer[] = $row->GetFields();
		}
		return $buffer;
	}

	public function GetJSON($standard=false) {
        if($standard==false)
		    return json_encode($this->GetArray());
        else
            return json_encode($this->GetArray(false));
	}

	/**
	 * Size of the resultset
	 * @deprecated since version 3.0 use Length() instead
	 * @return <int> Size of the resultset
	 */
	/*public function length() {
		return $this->Length();
	}*/

	/**
	 * Size of the resultset
	 * @return <int> Size of the resultset
	 */
	public function Length() {
		return $this->length;
	}

    /**
     * @param  $index
     * @return void
     */
    public function GetRow($index) {
        return $this->rows[$index];
    }


	/**
	 *
	 */
	public function IsLast() {
		return ($this->position == $this->length-1);
	}

	public function IsPosition($pos) {
		return (($this->position+1) == $pos);
	}

	/**
	 *
	 * @return <type> 
	 */
	public function IsFirst() {
		return ($this->position == 0);
	}
	/**
	 *
	 * @return <type>
	 */
	public function IsOdd() {
		return ($this->position % 2 != 0);
	}

	/**
	 *
	 * @param <type> $n
	 * @return <type> 
	 */
	public function IsNth($n) {
		return (($this->position + 1) % $n == 0);
	}

	/**
	 *
	 * @return <type> 
	 */
	public function IsEven() {
		return ($this->position % 2 == 0);
	}

	/**
	 * Size of the resultset without LIMIT
	 * @deprecated since version 3.0 use FoundRows() instead
	 * @return <int> Size of the resultset without LIMIT
	 */
	public function found_rows() {
		$this->FoundRows();
	}

	/**
	 * Size of the resultset without LIMIT
	 * @return <int> Size of the resultset without LIMIT
	 */
	public function FoundRows() {
		return $this->found_rows;
	}


	#[\ReturnTypeWillChange]
	public function rewind() {
		$this->position = 0;
		reset($this->rows);
	}

	#[\ReturnTypeWillChange]
	public function current() {
		$row = current($this->rows);
		return $row;
	}

	#[\ReturnTypeWillChange]
	public function key() {
		$key = key($this->rows);
		return $key;
	}

	#[\ReturnTypeWillChange]
	public function next() {
		$this->position++;
		$next = next($this->rows);
		return $next;
	}

	#[\ReturnTypeWillChange]
	public function valid() {
		$var = $this->current() !== false;
		return $var;
	}


	/**
	 * Get the affected number of rows
	 * @deprecated since version 3.0 use AffectedRows instead
	 * @return <int> affected number of rows
	 */
	/*public function affectedRows() {
		return $this->AffectedRows();
	}*/

	/**
	 * Get the affected number of rows
	 * @return <int> affected number of rows
	 */
	public function AffectedRows() {
		return $this->affectedRows;
	}

	/**
	 * Get the result resource itself
	 */
	public function &get() {
		return $this->result;
	}
	/**
	 * Get the current position
	 */
	public function position() {
		return $this->position;
	}
}

?>