<?php 

require_once 'includes/header.php';
?>

<section class="courses-section">
    <h1>Our Academic Programs</h1>
    <p class="subtitle">Explore our diverse range of courses designed that shape your future</p>
    
    <div class="courses-tabs">
        <div class="tab-buttons">
            <button class="tab-btn active" data-tab="computer-science">Computer Science</button>
            <button class="tab-btn" data-tab="business">Business Administration</button>
            <button class="tab-btn" data-tab="engineering">Engineering</button>
            <button class="tab-btn" data-tab="arts">Arts</button>
            <button class="tab-btn" data-tab="science">Science</button>
        </div>
        
        <div class="tab-content active" id="computer-science">
            <div class="courses-grid">
                <div class="course-card">
                    <div class="course-header">
                        <h3>Diploma in Computer Science</h3>
                        
                    </div>
                    <div class="course-body">
                        <p>A comprehensive foundation in computer science principles, programming, and IT fundamentals.</p>
                        <div class="course-meta">
                            <span><strong>Duration:</strong> 1 year</span>
                            <span><strong>Credits:</strong> 60</span>
                            <span><strong>Entry Requirements:</strong> 2 simple passes in A/ls</span>
                        </div>
                    </div>
                    
                </div>
                
                <div class="course-card">
                    <div class="course-header">
                        <h3>BSc Computer Science</h3>
                        
                    </div>
                    <div class="course-body">
                        <p>Advanced study of algorithms, software development, artificial intelligence, and computer systems.</p>
                        <div class="course-meta">
                            <span><strong>Duration:</strong> 4 years</span>
                            <span><strong>Credits:</strong> 120</span>
                            <span><strong>Entry Requirements:</strong> 3 simple passes in A/ls</span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="tab-content" id="business">
            <div class="courses-grid">
                <div class="course-card">
                    <div class="course-header">
                        <h3>Diploma in Business Administration</h3>
                        
                    </div>
                    <div class="course-body">
                        <p>Fundamentals of business operations and management principles.</p>
                        <div class="course-meta">
                            <span><strong>Duration:</strong> 1 year</span>
                            <span><strong>Credits:</strong> 60</span>
                            <span><strong>Entry Requirements:</strong> 2 simple passes in A/ls</span>
                        </div>
                    </div>
                   
                </div>
                
                <div class="course-card">
                    <div class="course-header">
                        <h3>Bachelor of Business Administration</h3>
                        
                    </div>
                    <div class="course-body">
                        <p>Comprehensive business education covering finance, marketing and HR.</p>
                        <div class="course-meta">
                            <span><strong>Duration:</strong> 4 years</span>
                            <span><strong>Credits:</strong> 120</span>
                            <span><strong>Entry Requirements:</strong>3 simple passes in A/ls</span>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        
        <div class="tab-content" id="engineering">
            <div class="courses-grid">
                <div class="course-card">
                    <div class="course-header">
                        <h3>BSc Software Engineering</h3>
                        
                    </div>
                    <div class="course-body">
                        <p>Specialized program focusing on software design, development methodologies, and quality assurance.</p>
                        <div class="course-meta">
                            <span><strong>Duration:</strong> 4 years</span>
                            <span><strong>Credits:</strong> 120</span>
                            <span><strong>Entry Requirements:</strong> 3 simple passes in A/ls</span>
                        </div>
                    </div>
                   
                </div>
                
                <div class="course-card">
                    <div class="course-header">
                        <h3>BSc Electrical Engineering</h3>
                       
                    </div>
                    <div class="course-body">
                        <p>Study of electrical systems, circuit design and electronics.</p>
                        <div class="course-meta">
                            <span><strong>Duration:</strong> 4 years</span>
                            <span><strong>Credits:</strong> 120</span>
                            <span><strong>Entry Requirements:</strong> 3 simple passes in A/ls</span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="tab-content" id="arts">
            <div class="courses-grid">
                <div class="course-card">
                    <div class="course-header">
                        <h3>Diploma in English</h3>
                        
                    </div>
                    <div class="course-body">
                        <p>Study of literature, creative writing, and critical analysis of English texts.</p>
                        <div class="course-meta">
                            <span><strong>Duration:</strong> 1 year</span>
                            <span><strong>Credits:</strong> 60</span>
                            <span><strong>Entry Requirements:</strong> 2 simple passes in A/ls</span>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        
        <div class="tab-content" id="science">
            <div class="courses-grid">
                <div class="course-card">
                    <div class="course-header">
                        <h3>Diploma in Science</h3>
                        
                    </div>
                    <div class="course-body">
                        <p>Foundation in scientific principles across biology, chemistry, physics, and mathematics.</p>
                        <div class="course-meta">
                            <span><strong>Duration:</strong> 1 year</span>
                            <span><strong>Credits:</strong> 60</span>
                            <span><strong>Entry Requirements:</strong> 2 simple passes in A/ls</span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            
            button.classList.add('active');
           
            const tabId = button.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
        });
    });
});
</script>

<?php 
require_once 'includes/footer.php';
?>