<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Help - Sport Indirect</title>
  <link rel="stylesheet" href="{{ asset('css/help.css') }}">
</head>

@extends('layout.userlayout')

@section('content')

<body>

    <div class="help-page">
        <h1>Help Center</h1>
        <p>Type your question below and get instant answers:</p>
        
        <div class="help-search">
            <input type="text" id="helpQuery" placeholder="Enter your question...">
        </div>
        
        <!-- Results will be displayed here -->
        <div id="helpResults" class="help-results"></div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const helpQueryInput = document.getElementById("helpQuery");
            const helpResultsContainer = document.getElementById("helpResults");
            
            let debounceTimeout = null;
            
            // Listen for keyup events in the search field
            helpQueryInput.addEventListener("keyup", function() {
                const query = this.value.trim();
                
                // Clear previous debounce timer
                if (debounceTimeout) {
                    clearTimeout(debounceTimeout);
                }
                
                // Wait 500ms after typing stops to perform the search
                debounceTimeout = setTimeout(() => {
                    if (query.length > 0) {
                        fetchHelpResults(query);
                    } else {
                        helpResultsContainer.innerHTML = "";
                    }
                }, 500);
            });
            
            function fetchHelpResults(query) {
                // In a real implementation, replace this simulation with a fetch call, for example:
                // fetch('/api/help?q=' + encodeURIComponent(query))
                //     .then(response => response.json())
                //     .then(data => displayHelpResults(data))
                //     .catch(error => console.error("Error:", error));
                
                // Dummy data for demonstration:
                const dummyData = [
                    { question: "How do I return a product?", answer: "You can return a product within 30 days of purchase if it is in original condition." },
                    { question: "What is your shipping policy?", answer: "We offer free shipping on orders above RM200 and fast delivery across the region." },
                    { question: "How do I track my order?", answer: "Track your order by logging into your account and clicking on 'My Orders'." },
                    { question: "Can I cancel my order?", answer: "Yes, you can cancel your order within 1 hour of placing it by contacting customer support." }
                ];
                
                // Filter dummy data based on the query
                const filteredData = dummyData.filter(item => 
                    item.question.toLowerCase().includes(query.toLowerCase()) ||
                    item.answer.toLowerCase().includes(query.toLowerCase())
                );
                
                displayHelpResults(filteredData);
            }
            
            function displayHelpResults(results) {
                // Clear previous results
                helpResultsContainer.innerHTML = "";
                
                if (results.length === 0) {
                    helpResultsContainer.innerHTML = "<p>No results found.</p>";
                    return;
                }
                
                // Append each result as an item
                results.forEach(item => {
                    const div = document.createElement("div");
                    div.className = "help-result-item";
                    div.innerHTML = `<h3>${item.question}</h3><p>${item.answer}</p>`;
                    helpResultsContainer.appendChild(div);
                });
            }
        });
    </script>
</body>
</html>
@endsection
