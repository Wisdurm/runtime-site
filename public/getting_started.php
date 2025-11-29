<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/css/style.css"> <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png"> <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png"> <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
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
						<a href="#start" id="start">Getting started</a>
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
						<a href="#objects" id="objects">Objects and values</a>
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
						<a href="#members" id="members">Members</a>
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
					<a href="#creating" id="creating">Creating and manipulating objects</a>
				</td></tr>
				<tr><td>
					<p>
						Objects can be created simply by referring to them
						<pre>
	int # This creates an empty object called int
						</pre>
						If you want to give objects members, this can be done using either the <code>Object()</code>
						or <code>Assign()</code> functions.
					</p>
					<p>
						TODO: object doesnt evaluate, assign does
						<code>Object()</code> will simply assign new members by giving them incrementing unique int keys.
						<br>
						<code>Assign()</code> will assign a value to a specific member. This allows you to change existing values,
						as well as create new ones with specific keys, which don't have to abide to an incrementing schema.
					</p>
				</td></tr>
			</table>
			<table class="navitem">
				<tr><td>
						<a href="#evaluation" id="evaluation">Evaluation</a>
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
						<a href="#quirk" id="quirk">A quirk of evaluation</a>
				</td></tr>
				<tr><td>
					<p>
						In order to understand evaluation fully, you will need to be aware of the specific mechanisms behind
						how it works.
					</p>
					<p>
						In the last chapter we went over how an object with a single value is evaluated. However what if an object
						has multiple members? In that case the <strong> member which was lasted assigned to</strong> will be evaluated.
					</p>
					<p>
						<figure>
							<img src="/images/term4.png">
							<figcaption>
								When we first print <code>obj</code>, it will result in "I love you :D", as that is the last member it
								was assigned. The next time however, it will print "I no longer hate you :)", since the first member
								had been assigned to again.
							</figcaption>
						</figure>
						As showcased above, the <em>index</em> of a member doesn't necessarily have anything to do with when it was last assigned to.
					</p>
				</td></tr>
			</table>
			<table class="navitem">
				<tr><td>
						<a href="#functions" id="functions">Functions</a>
				</td></tr>
				<tr><td>
					<p>
						In the last chapters, we went over evaluation. However in order for Runtime to be langauge that can actually be used for
						anything, there needs to be a second mechanism for evaluating objects. That mechanism is <strong> calling </strong>.
					</p>
					<p>
						Every object can be both <b>evaluated</b> and <b>called</b>, and in principle they are not so different from eachother.
						While evaluating an object will... evaluate it's last assigned to member, calling an object will evaluate all of an objects
						members in order of assignment, before returning the last one.
					</p>
					<p>
						This, however, is where things start to get difficult. While the basic concept of functions is what was just described,
						there are quite a lot of quirks in the implementation which make things harder. For example, evaluating an object or its value
						will write the objects value to memory, whereas calling it will not. Heres an example to try to help you understand.
						<figure>
							<img src="/images/term5.png">
							<figcaption>
								The first time we print <code>a</code>, it will evaluate its <code>Print("Hello")</code> member, thereby calling it.
								It will then return 0, which is the value actually printed by the top level print statement.
								The second time we print <code>a</code> however, it will only print 0.
								This is because the value of <code>Print("Hello")</code> has already been evaluated, and since it returned a value of 0,
								that is what was written to memory, and thus its what is returned the second time a is evaluated.
							</figcaption>
						</figure>
						<figure>
							<img src="/images/term6.png">
							<figcaption>
								In this case we have a similar setup: the object <code>b</code> is identical to the object <code>a</code>.
								However, instead of printing the value of <code>b</code>, we <b>call</b> <code>b</code>, which will only evaluate its
								member. However, calling an object does not write the evaluated values down, meaning we can call the <code>b</code>
								object as many times as we want.
							</figcaption>
						</figure>
					</p>
					<p>
						The last image should give you decent idea of how functions work. You create an object with a series of object calls, then
						you call that object, which results in all of its members being evaluated. Now we must move on to arguments/parameters.
					</p>
					<p>
						Here is a simple function which takes a single number as an parameter and prints its following digit.
						<figure>
							<img src="/images/term7.png">
							<figcaption>
								The function <code>func</code> takes a single parameter x, then prints the result of x + 1.
							</figcaption>
						</figure>
						Parameters work in kind of strange way. Whenever you create an object instead of just always creating an empty
						object with the value of 0, the interpreter will first look if there are any parameters which need to be defined.
						For example, in the code snippet above, when the function is called, it will create an object called x. Then,
						when instantiating it, it will see that there is currently a single argument which is yet to be assigned to anything
						(since we passed args to <code>func</code>), and it will then assign its value to x. So the first time in the snippet
						we call <code>func</code>, x will be assigned a value of 1, since that's the argument we gave the function. The last
						time we call the function, we don't pass any arguments, so when x is created, it will simply be assigned a value of 0
						by default. Note that this does mean that if you have some complex code with deep, multi-layered function calls,
						omitting arguments may be problematic, assuming the functions don't deal with it themselves.
					</p>
				</td></tr>
			</table>
			<table class="navitem">
				<tr><td>
						<a href="#ref" id="ref">References and values</a>
				</td></tr>
				<tr><td>
					<p>
						Objects are always passed by reference, and values are always passed by value.
					</p>
					<p>
						<pre>
Object(one, 1)
Object(value, one-0) # Passed the value of one
Object(reference, one) # Passed a reference to one
Assign(one, 0, 2)
Print(value) # Will print 1
Print(reference) # Will print 2
						</pre>
						This is another case where the workings of evaluation will be prone to mess things up.
					</p>
				</td></tr>
			</table>
			<table class="navitem">
				<tr><td>
						<a href="#quick" id="quick">Quick overview of standard library</a>
				</td></tr>
				<tr><td>
					<p>
						Congratulations! You've made it to the end of the documentation. In theory, you should now be able to write functional
						Runtime code, although in practice it will of course take some time before you're able to fully grasp the language.
					</p>
					<p>
						This section will be a quick overview of some of the most useful functions that come with Runtime. A full reference of
						all Runtime objects can be found <a href="reference.php">here</a>.
					</p>
					<table>
						<tr>
							<th>Name</th>
							<th>Evaluates args</th>
							<th>Returns</th>
							<th>Function</th>
						</tr>
						<tr>
							<td>Print</td>
							<td>Yes</td>
							<td>1</td>
							<td>Prints all arguments to the standard output.</td>
						</tr>
						<tr>
							<td>Input</td>
							<td>No</td>
							<td>Input</td>
							<td>Returns a single line from the standard input.</td>
						</tr>
						<tr>
							<td>Object</td>
							<td>No</td>
							<td>Success (1/0)</td>
							<td>Adds members to object.</td>
						</tr>
						<tr>
							<td>Assign</td>
							<td>Yes</td>
							<td>Success (1/0)</td>
							<td>Assigns a member to a specific index on an object.</td>
						</tr>
						<tr>
							<td>Include</td>
							<td>Yes</td>
							<td>Success (1/0)</td>
							<td>Runs a Runtime file and includes its defined objects.</td>
						</tr>
						<tr>
							<td>If</td>
							<td>Yes</td>
							<td>Statements or success (1/0)</td>
							<td>Conditional statement.</td>
						</tr>
						<tr>
							<td>While</td>
							<td>Yes</td>
							<td>Success (1/0)</td>
							<td>Conditional loop.</td>
						</tr>
						<tr>
							<td>Not</td>
							<td>Yes</td>
							<td>Inverted or 0 (fail)</td>
							<td>Inverts a boolean.</td>
						</tr>
					</table>
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
