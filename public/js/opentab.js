function showTab(tabName) {
            // Hide all tabs
            document.querySelectorAll('.settings-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Remove active class from all buttons
            document.querySelectorAll('.settings-tab').forEach(tab => {
                tab.classList.remove('active', 'text-white', 'bg-slate-800');
                tab.classList.add('text-slate-400');
            });
            
            // Show selected tab
            document.getElementById(tabName + '-tab').classList.remove('hidden');
            
            // Add active class to clicked button
            event.target.closest('.settings-tab').classList.add('active', 'text-white', 'bg-slate-800');
            event.target.closest('.settings-tab').classList.remove('text-slate-400');
        }