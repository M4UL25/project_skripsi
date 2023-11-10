<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        #quiz-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
        }

        h2 {
            text-align: center;
        }

        .question {
            margin-bottom: 20px;
        }

        .options {
            list-style: none;
            padding: 0;
        }

        .option {
            margin: 5px 0;
        }

        button {
            background-color: #3498db;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px auto 0;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div id="quiz-container">
    <h2>Quiz</h2>
    <div id="question" class="question"></div>
    <ul id="options" class="options"></ul>
    <button onclick="checkAnswer()">Next</button>
</div>

<script>
    // Question data
    const questions = [
        {
            question: "What is the capital of France?",
            options: ["Berlin", "Paris", "Madrid", "Rome"],
            correctAnswer: "Paris"
        },
        {
            question: "What is the largest planet in our solar system?",
            options: ["Mars", "Jupiter", "Earth", "Saturn"],
            correctAnswer: "Jupiter"
        },
        // Add more questions as needed
    ];

    // Variables
    let currentQuestionIndex = 0;
    const questionElement = document.getElementById("question");
    const optionsElement = document.getElementById("options");

    // Function to display the current question
    function displayQuestion() {
        const currentQuestion = questions[currentQuestionIndex];
        questionElement.textContent = currentQuestion.question;

        optionsElement.innerHTML = "";
        currentQuestion.options.forEach((option, index) => {
            const li = document.createElement("li");
            li.textContent = option;
            li.classList.add("option");
            li.onclick = () => checkAnswer(index);
            optionsElement.appendChild(li);
        });
    }

    // Function to check the selected answer
    function checkAnswer(selectedIndex) {
        const currentQuestion = questions[currentQuestionIndex];
        const selectedOption = currentQuestion.options[selectedIndex];

        if (selectedOption === currentQuestion.correctAnswer) {
            alert("Correct!");
        } else {
            alert("Incorrect. The correct answer is: " + currentQuestion.correctAnswer);
        }

        currentQuestionIndex++;

        if (currentQuestionIndex < questions.length) {
            displayQuestion();
        } else {
            alert("Quiz completed!");
            resetQuiz();
        }
    }

    // Function to reset the quiz
    function resetQuiz() {
        currentQuestionIndex = 0;
        displayQuestion();
    }

    // Initial display
    displayQuestion();
</script>

</body>
</html> -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        #quiz-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
        }

        h2 {
            text-align: center;
        }

        .question {
            margin-bottom: 20px;
        }

        .options {
            list-style: none;
            padding: 0;
        }

        .option {
            margin: 5px 0;
        }

        button {
            background-color: #3498db;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px auto 0;
        }

        button:hover {
            background-color: #2980b9;
        }

        #result {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div id="quiz-container">
    <h2>Quiz</h2>
    <div id="question" class="question"></div>
    <ul id="options" class="options"></ul>
    <button onclick="checkAnswer()">Next</button>
    <div id="result"></div>
</div>

<script>
    // Question data
    const questions = [
        {
            question: "What is the capital of France?",
            options: ["Berlin", "Paris", "Madrid", "Rome"],
            correctAnswer: "Paris"
        },
        {
            question: "What is the largest planet in our solar system?",
            options: ["Mars", "Jupiter", "Earth", "Saturn"],
            correctAnswer: "Jupiter"
        },
        // Add more questions as needed
    ];

    // Variables
    let currentQuestionIndex = 0;
    let score = 0;
    const questionElement = document.getElementById("question");
    const optionsElement = document.getElementById("options");
    const resultElement = document.getElementById("result");

    // Function to display the current question
    function displayQuestion() {
        const currentQuestion = questions[currentQuestionIndex];
        questionElement.textContent = currentQuestion.question;

        optionsElement.innerHTML = "";
        currentQuestion.options.forEach((option, index) => {
            const li = document.createElement("li");
            li.textContent = option;
            li.classList.add("option");
            li.onclick = () => checkAnswer(index);
            optionsElement.appendChild(li);
        });
    }

    // Function to check the selected answer
    function checkAnswer(selectedIndex) {
        const currentQuestion = questions[currentQuestionIndex];
        const selectedOption = currentQuestion.options[selectedIndex];

        if (selectedOption === currentQuestion.correctAnswer) {
            score++;
        }

        currentQuestionIndex++;

        if (currentQuestionIndex < questions.length) {
            displayQuestion();
        } else {
            showResult();
        }
    }

    // Function to display the quiz result
    function showResult() {
        resultElement.innerHTML = `<p>Your score is: ${score} out of ${questions.length}</p>`;
        optionsElement.innerHTML = "";
        document.getElementById("question").textContent = "";
        document.getElementById("result").style.display = "block";
        document.getElementById("result").style.color = "#3498db";
        document.getElementById("result").style.fontWeight = "bold";
    }

    // Initial display
    displayQuestion();
</script>

</body>
</html> -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        #quiz-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
        }

        h2 {
            text-align: center;
        }

        .question {
            margin-bottom: 20px;
        }

        .options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        button {
            background-color: #3498db;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        #result {
            text-align: center;
            margin-top: 20px;
            display: none;
        }

        #exit-btn {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>

<div id="quiz-container">
    <h2>Quiz</h2>
    <div id="question" class="question"></div>
    <div id="options" class="options"></div>
    <button onclick="checkAnswer()">Next</button>
    <div id="result"></div>
    <button id="exit-btn" onclick="exitQuiz()">Exit</button>
</div>

<script>
    // Question data
    const questions = [
        {
            question: "What is the capital of France?",
            options: ["Berlin", "Paris", "Madrid", "Rome"],
            correctAnswer: "Paris"
        },
        {
            question: "What is the largest planet in our solar system?",
            options: ["Mars", "Jupiter", "Earth", "Saturn"],
            correctAnswer: "Jupiter"
        },
        // Add more questions as needed
    ];

    // Variables
    let currentQuestionIndex = 0;
    let score = 0;
    const questionElement = document.getElementById("question");
    const optionsElement = document.getElementById("options");
    const resultElement = document.getElementById("result");

    // Function to display the current question
    function displayQuestion() {
        const currentQuestion = questions[currentQuestionIndex];
        questionElement.textContent = currentQuestion.question;

        optionsElement.innerHTML = "";
        currentQuestion.options.forEach((option) => {
            const btn = document.createElement("button");
            btn.textContent = option;
            btn.classList.add("option");
            btn.onclick = () => checkAnswer(option);
            optionsElement.appendChild(btn);
        });
    }

    // Function to check the selected answer
    function checkAnswer(selectedOption) {
        const currentQuestion = questions[currentQuestionIndex];

        if (selectedOption === currentQuestion.correctAnswer) {
            score++;
        }

        currentQuestionIndex++;

        if (currentQuestionIndex < questions.length) {
            displayQuestion();
        } else {
            showResult();
        }
    }

    // Function to display the quiz result
    function showResult() {
        resultElement.innerHTML = `<p>Your score is: ${score} out of ${questions.length}</p>`;
        optionsElement.innerHTML = "";
        document.getElementById("question").textContent = "";
        document.getElementById("result").style.display = "block";
        document.getElementById("result").style.color = "#3498db";
        document.getElementById("result").style.fontWeight = "bold";
    }

    // Function to exit the quiz
    function exitQuiz() {
        alert("Quiz exited!");
        resetQuiz();
    }

    // Function to reset the quiz
    function resetQuiz() {
        currentQuestionIndex = 0;
        score = 0;
        document.getElementById("result").style.display = "none";
        displayQuestion();
    }

    // Initial display
    displayQuestion();
</script>

</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App with Bootstrap</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        #quiz-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
        }

        h2 {
            text-align: center;
        }

        .question {
            margin-bottom: 20px;
        }

        .options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .option-btn {
            background-color: #3498db;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .option-btn:hover {
            background-color: #2980b9;
        }

        #result {
            text-align: center;
            margin-top: 20px;
            display: none;
        }

        #exit-btn {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>

<div id="quiz-container" class="container">
    <h2 class="mb-4">Quiz</h2>
    <div id="question" class="question"></div>
    <div id="options" class="options"></div>
    <button class="option-btn mt-3" onclick="checkAnswer()">Next</button>
    <div id="result"></div>
    <button id="exit-btn" class="option-btn" onclick="exitQuiz()">Exit</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Question data
    const questions = [
        {
            question: "What is the capital of France?",
            options: ["Berlin", "Paris", "Madrid", "Rome"],
            correctAnswer: "Paris"
        },
        {
            question: "What is the largest planet in our solar system?",
            options: ["Mars", "Jupiter", "Earth", "Saturn"],
            correctAnswer: "Jupiter"
        },
        // Add more questions as needed
    ];

    // Variables
    let currentQuestionIndex = 0;
    let score = 0;
    const questionElement = document.getElementById("question");
    const optionsElement = document.getElementById("options");
    const resultElement = document.getElementById("result");

    // Function to display the current question
    function displayQuestion() {
        const currentQuestion = questions[currentQuestionIndex];
        questionElement.textContent = currentQuestion.question;

        optionsElement.innerHTML = "";
        currentQuestion.options.forEach((option) => {
            const btn = document.createElement("button");
            btn.textContent = option;
            btn.classList.add("btn", "btn-primary", "option-btn");
            btn.onclick = () => checkAnswer(option);
            optionsElement.appendChild(btn);
        });
    }

    // Function to check the selected answer
    function checkAnswer(selectedOption) {
        const currentQuestion = questions[currentQuestionIndex];

        if (selectedOption === currentQuestion.correctAnswer) {
            score++;
        }

        currentQuestionIndex++;

        if (currentQuestionIndex < questions.length) {
            displayQuestion();
        } else {
            showResult();
        }
    }

    // Function to display the quiz result
    function showResult() {
        resultElement.innerHTML = `<p class="lead">Your score is: ${score} out of ${questions.length}</p>`;
        optionsElement.innerHTML = "";
        questionElement.textContent = "";
        resultElement.style.display = "block";
    }

    // Function to exit the quiz
    function exitQuiz() {
        alert("Quiz exited!");
        resetQuiz();
    }

    // Function to reset the quiz
    function resetQuiz() {
        currentQuestionIndex = 0;
        score = 0;
        resultElement.style.display = "none";
        displayQuestion();
    }

    // Initial display
    displayQuestion();
</script>

</body>
</html>