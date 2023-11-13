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
    <h2 class="mb-4">Quiz Geologi</h2>
    <div id="question" class="question"></div>
    <div id="options" class="options"></div>
    <button class="option-btn mt-3" onclick="checkAnswer()">Next</button>
    <div id="result"></div>
    <!-- <a href="/quiz.php" id="exit-btn" class="option-btn" onclick="exitQuiz() >Exit</a> -->
    <button id="exit-btn" class="option-btn" onclick="exitQuiz() ">Exit</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Question data
    const questions = [
        {
            question: "Yang termasuk bencana geologi?",
            options: ["Banjir", "Angin Kencang", "Tsunami", "Gempa"],
            correctAnswer: "Gempa"
        },
        {
            question: " Faktor penyebab wilayah Indoensia sering dilanda gempa adalah...",
            options: ["Hutan di Indonesia sudah gundul", "Dilalui dua pegunungan lipatan muda", "Terletak diantara dua samudera", "Tempat bertemunya tiga lempeng litosfer"],
            correctAnswer: "Tempat bertemunya tiga lempeng litosfer"
        },
        {
            question: "Beberapa pulau di Indonesia tercatat sebagai pulau yang rawan gempa lantaran akrab dengan sentra gempa. Namun ada pula pulau yang cukup kondusif lantaran jauh dari sentra gempa. Salah satu pulau di Indonesia yang jauh dari sentra gempa adalah...",
            options: ["Kalimantan", "Jawa", "Sulawesi", "Sumatera"],
            correctAnswer: "Kalimantan"
        },
        {
            question: "Gempa bumi yang terjadi karena aktivitas meletusnya gunung berapi adalah..",
            options: ["Vulkanik", "Tektonik", "Tumbukan", "Runtuhan"],
            correctAnswer: "Vulkanik"
        },
        {
            question: "Gempa bumi sanggup menjadikan kerusakan yang bervariasi tergantung pada kekuatan gempa tersebut. Alat yang dipakai untuk mencatat kekuatan gempa adalah...",
            options: ["Seismograf", "Altimeter", "Anemometer", "Termograf"],
            correctAnswer: "Seismograf"
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
        window.location.href = "../quiz.php";
        // resetQuiz();
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