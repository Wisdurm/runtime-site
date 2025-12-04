<?php

function listData($refJson) {
	$refList = json_decode($refJson);

	foreach ($refList as $refObj) {
		// Best way I was able to come up with
		echo "<div class='function' id='" . $refObj->name . "'>";
		echo "<b>" . $refObj->name . " ( </b>";
		echo "<small>";
			foreach ($refObj->args as $key=>$argObj) {
				echo $argObj->name . " (eval=" . ($argObj->eval ? "true" : "false") . ")";
				if ($key < sizeof($refObj->args)-1) {
					echo ", ";
				}
			}
		echo "</small>";
		echo "<b> )</b>";
		echo "<span class='version'> v." . $refObj->ver . "</span>";
		echo "<br>";
		echo "<small>";
			echo "<b>Returns </b>" . $refObj->return;
		echo "</small>";
		echo "<p>";
			echo $refObj->desc;
		echo "</p>";
		echo "</div>";
	}
}

$stData = <<<JSON
[
	{
		"name" : "Return",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "object",
				"eval" : false
			}	
		],
		"return" : "object",
		"desc" : "Returns the first argument. This function may be removed later."
	},
	{
		"name" : "Print",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "args...",
				"eval" : true
			}	
		],
		"return" : "1 (True)",
		"desc" : "Prints all args to the standard output."
	},
	{
		"name" : "Input",
		"ver" : "<0.9.6",
		"args" : [
		],
		"return" : "Input",
		"desc" : "Retrieves a single line from the standard input."
	},
	{
		"name" : "Object",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "object",
				"eval" : false
			},
			{
				"name" : "members...",
				"eval" : false
			}
		],
		"return" : "Success (1/0)",
		"desc" : "Adds all members to object. Members are added via incrementing int keys."
	},
	{
		"name" : "Assign",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "object",
				"eval" : false
			},
			{
				"name" : "key",
				"eval" : true
			},
			{
				"name" : "member",
				"eval" : true
			}
		],
		"return" : "Success (1/0)",
		"desc" : "Assigns member to object at key."
	},
	{
		"name" : "Exit",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "code",
				"eval" : true
			}
		],
		"return" : "Nothing",
		"desc" : "Exits Runtime. Exit code can be specified, default is 0."
	},
	{
		"name" : "Include",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "files...",
				"eval" : true
			}
		],
		"return" : "Success (1/0)",
		"desc" : "Runs a Runtime file, and adds its members to the current scope."
	},
	{
		"name" : "If",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "condition",
				"eval" : true
			},
			{
				"name" : "if clause",
				"eval" : true
			},
			{
				"name" : "else clause",
				"eval" : true
			}
		],
		"return" : "Success or triggered clause",
		"desc" : "Conditional evaluation based on condition. Else clause is optional."
	},
	{
		"name" : "While",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "condition",
				"eval" : true
			},
			{
				"name" : "statements...",
				"eval" : true
			}
		],
		"return" : "Success (1/0)",
		"desc" : "Repeatedly evaluates a series of statements, as long as a conditional is true. Despite evaluation, the value of the conditional is not written down."
	},
	{
		"name" : "Not",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "boolean",
				"eval" : true
			}
		],
		"return" : "Boolean (1/0) or fail (0)",
		"desc" : "Inverts the value of a boolean."
	},
	{
		"name" : "Format",
		"ver" : "0.9.8",
		"args" : [
			{
				"name" : "format string",
				"eval" : true
			},
			{
				"name" : "objects...",
				"eval" : true
			}
		],
		"return" : "Resulting string or failure (0)",
		"desc" : "String interpolation: characters can be escaped, and non-escaped instances of $ will be replaced with objects given to this function."
	}
]
JSON;

$mtData = <<<JSON
[
	{
		"name" : "Add",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "numbers...",
				"eval" : true
			}	
		],
		"return" : "Result",
		"desc" : "Adds all arguments together and returns the result."
	},
	{
		"name" : "Minus",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "numbers...",
				"eval" : true
			}	
		],
		"return" : "Result",
		"desc" : "Negates all arguments from the first one and returns the result."
	},
	{
		"name" : "Multiply",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "numbers...",
				"eval" : true
			}	
		],
		"return" : "Result",
		"desc" : "Multiplies all arguments with the first one and returns the result."
	},
	{
		"name" : "Divide",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "numbers...",
				"eval" : true
			}	
		],
		"return" : "Result",
		"desc" : "Divides all arguments from the first one and returns the result."
	},
	{
		"name" : "Mod",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "numbers...",
				"eval" : true
			}	
		],
		"return" : "Result",
		"desc" : "Applies modulo from all arguments against the first one and returns the result."
	},
	{
		"name" : "Equal",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "value1",
				"eval" : true
			},
			{
				"name" : "value2",
				"eval" : true
			}
		],
		"return" : "Matching (1/0)",
		"desc" : "Compares values and returns whether or not they match. Not limited to numbers; works for strings as well."
	},
	{
		"name" : "LargerThan",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "value1",
				"eval" : true
			},
			{
				"name" : "value2",
				"eval" : true
			}
		],
		"return" : "Result",
		"desc" : "Returns whether or not value1 is larger than value2."
	},
	{
		"name" : "SmallerThan",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "value1",
				"eval" : true
			},
			{
				"name" : "value2",
				"eval" : true
			}
		],
		"return" : "Result",
		"desc" : "Returns whether or not value1 is smaller than value2."
	},
	{
		"name" : "Sine",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "value",
				"eval" : true
			}
		],
		"return" : "Result",
		"desc" : "Returns the sine of value. This maps directly to the <a href='https://cplusplus.com/reference/cmath/sin/'>C++ function.</a>"
	},
	{
		"name" : "Cosine",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "value",
				"eval" : true
			}
		],
		"return" : "Result",
		"desc" : "Returns the cosine of value. This maps directly to the <a href='https://cplusplus.com/reference/cmath/cos/'>C++ function.</a>"
	},
	{
		"name" : "Tangent",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "value",
				"eval" : true
			}
		],
		"return" : "Result",
		"desc" : "Returns the tangent of value. This maps directly to the <a href='https://cplusplus.com/reference/cmath/tan/'>C++ function.</a>"
	},
	{
		"name" : "ArcCosine",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "value",
				"eval" : true
			}
		],
		"return" : "Result",
		"desc" : "Returns the arccosine of value. This maps directly to the <a href='https://cplusplus.com/reference/cmath/acos/'>C++ function.</a>"
	},
	{
		"name" : "ArcSine",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "value",
				"eval" : true
			}
		],
		"return" : "Result",
		"desc" : "Returns the arcsine of value. This maps directly to the <a href='https://cplusplus.com/reference/cmath/asin/'>C++ function.</a>"
	},
	{
		"name" : "ArcTangent",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "value",
				"eval" : true
			}
		],
		"return" : "Result",
		"desc" : "Returns the arctangent of value. This maps directly to the <a href='https://cplusplus.com/reference/cmath/atan/'>C++ function.</a>"
	},
	{
		"name" : "ArcTangent2",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "x",
				"eval" : true
			},
			{
				"name" : "y",
				"eval" : true
			}
		],
		"return" : "Result",
		"desc" : "Returns the atan2 of two values. This maps directly to the <a href='https://cplusplus.com/reference/cmath/atan2/'>C++ function.</a>"
	},	
	{
		"name" : "Power",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "base",
				"eval" : true
			},
			{
				"name" : "exponent",
				"eval" : true
			}
		],
		"return" : "Result",
		"desc" : "Returns the power of two values. This maps directly to the <a href='https://cplusplus.com/reference/cmath/pow/'>C++ function.</a>"
	},	
	{
		"name" : "SquareRoot",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "value",
				"eval" : true
			}
		],
		"return" : "Result",
		"desc" : "Returns the square root of value. This maps directly to the <a href='https://cplusplus.com/reference/cmath/sqrt/'>C++ function.</a>"
	},
	{
		"name" : "Floor",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "value",
				"eval" : true
			}
		],
		"return" : "Result",
		"desc" : "Returns the floor of value. This maps directly to the <a href='https://cplusplus.com/reference/cmath/floor/'>C++ function.</a>"
	},
	{
		"name" : "Ceiling",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "value",
				"eval" : true
			}
		],
		"return" : "Result",
		"desc" : "Returns the ceiling of value. This maps directly to the <a href='https://cplusplus.com/reference/cmath/ceil/'>C++ function.</a>"
	},
	{
		"name" : "Round",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "value",
				"eval" : true
			}
		],
		"return" : "Result",
		"desc" : "Returns value rounded. This maps directly to the <a href='https://cplusplus.com/reference/cmath/round/'>C++ function.</a>"
	},	
	{
		"name" : "NaturalLogarithm",
		"ver" : "<0.9.6",
		"args" : [
			{
				"name" : "value",
				"eval" : true
			}
		],
		"return" : "Result",
		"desc" : "Returns the natural logarithm of value. This maps directly to the <a href='https://cplusplus.com/reference/cmath/log/'>C++ function.</a>"
	},
	{
		"name" : "RandomInteger()",
		"ver" : "0.10.0",
		"args" : [
		],
		"return" : "Random integer",
		"desc" : "Returns a random number between 0 and the integer limit."
	},
	{
		"name" : "RandomDecimal()",
		"ver" : "<0.10.0",
		"args" : [
		],
		"return" : "Random decimal",
		"desc" : "Returns a random number between 0 and 1."
	}
]
JSON;

$ioData = <<<JSON
[
	{
		"name" : "FileCreate",
		"ver" : "0.10.0",
		"args" : [
			{
				"name" : "file object",
				"eval" : false
			},
			{
				"name" : "file path",
				"eval" : true
			}
		],
		"return" : "Success (1/0)",
		"desc" : "Creates a file object."
	},
	{
		"name" : "FileOpen",
		"ver" : "0.10.0",
		"args" : [
			{
				"name" : "file object",
				"eval" : false
			}
		],
		"return" : "Success (1/0)",
		"desc" : "Opens file object."
	},
	{
		"name" : "FileClose",
		"ver" : "0.10.0",
		"args" : [
			{
				"name" : "file object",
				"eval" : false
			}
		],
		"return" : "Success (1/0)",
		"desc" : "Closes file object."
	},
	{
		"name" : "FileRead",
		"ver" : "0.10.0",
		"args" : [
			{
				"name" : "file object",
				"eval" : false
			}
		],
		"return" : "Line or fail (0)",
		"desc" : "Reads a single line from file object. The line will increment each time."
	},
	{
		"name" : "FileWrite",
		"ver" : "0.10.0",
		"args" : [
			{
				"name" : "file object",
				"eval" : false
			},
			{
				"name" : "text",
				"eval" : true
			}
		],
		"return" : "Success (1/0)",
		"desc" : "Writes text to file object."
	}
]
JSON;


?>
