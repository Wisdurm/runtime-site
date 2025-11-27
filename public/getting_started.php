<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<title>Getting started</title>
</head>
<body>
	<table>
		<tr>
		<!-- Main -->
		<td class="main">
			<a href="/public/index.php"><img src="../images/runtime.svg"></a>
			<br>
			This documentation is, just like Runtime, still a work in progress. While it is technically done, I have no doubts that people
			will be able to find problems with it. If you notice something is awry, don't hesitate to create an issue on the runtime-site github page.
			<table class="navitem">
				<tr><td>
						Getting started
				</td></tr>
				<tr><td>
					To get started, you should install Runtime. Links and instructions are available <a href="installation.php">here</a>.
					<p>
						First, you should try seeing if you can get into the Runtime environment. Assuming you have it properly
						installed, you can simply run <code>Runtime</code> in the terminal. Note the uppercase R.
					</p>
					<figure>
						<img src="/images/term1.png">
						<figcaption>You should be met by something like this</figcaption>
					</figure>
					<p>
						Runtime runs code in two seperate ways, either in the live interpreter, which is what you're looking at here,
						or it can directly run files, in which there will be no pretty visuals. You can also run files directly in the live
						interpreter using the <code>Include()</code> function, but we will take a proper look at that later.
					</p>
				</td></tr>
			</table>
			<table class="navitem">
				<tr><td>
						Objects and values	
				</td></tr>
				<tr><td>
					<p>
						This guide is written under the assumption that you have atleast a cursory level understanding of programming,
						however you might be able to follow along even if you don't.
					</p>
					<p>
						Everything in Runtime is either object or value. This makes learning the workings of the language extremely simple,
						in exchange for making the process of actually writing code quite a bit harder.
					</p>
					<figure>
						<figcaption>In the following image, everything can be grouped into values or objects.</figcaption>
						<img src="/images/term2.png">
						<figcaption>
							As you (maybe) can see, <code>Object</code> and <code>Print</code> are both functions.
	 						However, in Runtime, functions are objects.
							<br>
							This leaves us with <code>"Hello world"</code> and <code>str</code>, the former of which is a literal, and
							the latter a variable, which also happens to be an object.
						</figcaption>
					</figure>
					<p>
						This might leave you with some questions. If str is an object, then what are values?
						<br>
						The answer is quite simple, the literal, which is assigned to str, IS the value. In this case the str object
						acts as a short of container for the literal, as values cannot exist by themselves in Runtime.
					</p>
				</td></tr>
			</table>
			<table class="navitem">
				<tr><td>
						Members
				</td></tr>
				<tr><td>
					<p>
						Like you would assume, objects can have members. For example, in the previous snippet of code, str had an
						unnamed member with the value of "Hello world".
					</p>
					<p>
						You can access members using the accession operator -
						<pre>
	Object(str "Hello") # Commas are completely optional in Runtime. You can add them if you feel they help code readability
	Print(str-0)
	# This prints Hello
						</pre>
						Here <code>str</code> was assigned the value, by default, at it's 0th index. You can think of objects as arrays.
					</p>
					<p>
						However, you can also think of objects as dictionaries, since you can also assign members via a string key.
						<pre>
	Object(str)
	Assign(str, "msg", "Greetings!")
	Print(str-"msg")
	# This prints Greetings!
	Print(str-0)
	# This also prints Greetings
						</pre>
						Every member with a string key also has an int key, however this is not necessarily true the other way around.
					</p>
				</td></tr>
			</table>
			<table class="navitem">
				<tr><td>
						Creating and manipulating objects
				</td></tr>
				<tr><td>
					<p>
						Objects can be created simply referring to them
						<pre>
	int # This creates an empty object called int
						</pre>
						If you want to give objects members, this can be done using either the <code>Object()</code>
						or <code>Assign()</code> functions.
					</p>
					<p>
						<code>Object()</code> will simply assign new members by giving them incrementing unique int keys.
						<br>
						<code>Assign()</code> will assign a value to a specific member. This allows you to change existing values,
						as well as create new ones with specific keys, which don't have to abide to an incrementing schema.
					</p>
				</td></tr>
			</table>
			<table class="navitem">
				<tr><td>
						Evaluation
				</td></tr>
				<tr><td>
					<p>
						Look at the following snippet of code
						<pre>
Object(i Input()) # Assign user input to the variable i
Print("Hello")
Print(i)
						</pre>
						How would you assume the control flow would work?
						<figure>
							<img src="/images/term3.png">
							<figcaption>
								Surprisingly enough, we see the "Hello" message <em>before</em> we are asked for input.
							</figcaption>
						</figure>
						Why does this happen?
					</p>
					<p>
						The answer is lazy-evaluation, or as I call it in Runtime, questionable-evaluation.
						Lazy-evaluation means that values are only evaluated when needed. For exaple, in Haskell
						you may assign the numbers 0-infinity to an array. While in most languages this would be
						impossible, Haskell allows this because it will only evaluate the numbers when you ask it to.
					</p>
					<p>
						This is also how it works in Runtime. In the code snippet above, while i is assigned the value of <code>Input()</code>
						before "Hello" is printed, we only access it's value later in the line <code>Print(i)</code>.
						The <code>Print()</code> function will evaluate it's arguments, in order to print them.
					</p>
					<p>
						However if you're a Haskell aficionado, you may see a problem with this: Runtime is not purely functional, which
						means functions can have side effects. This is where the "questionable" part comes in.
						It is entirely possible, that the return value of a function has changed in the time it took between assigning it
						to a variable and actually evaluating it.
					</p>
					<p>
						This is simply one of the things you will have to keep in mind when writing code in Runtime.
					</p>
				</td></tr>
			</table>
			<table class="navitem">
				<tr><td>
						Functions
				</td></tr>
				<tr><td>
				</td></tr>
			</table>
			<table class="navitem">
				<tr><td>
						References and values
				</td></tr>
				<tr><td>
				</td></tr>
			</table>
			<table class="navitem">
				<tr><td>
						Quick overview of standard library
				</td></tr>
				<tr><td>
				</td></tr>
			</table>
		</td>
		<!-- Nav -->
		<?php include "../src/nav.php"; ?>
	</table>
	<div class="copyright">
		This page is licensed under the CC0-1.0 license. You are free to use the source code of this site however you want,
		even without any attribution. The source code is available at <a href="https://github.com/Wisdurm/runtime-site">my Github</a>
	</div>
</body>
</html>
