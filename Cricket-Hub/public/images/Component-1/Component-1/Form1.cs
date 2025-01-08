using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Input;
using BOOSE;

namespace Component_1
{
    /// <summary>
    /// Represent main form and provides user interface
    /// for executing BOOSE and displaying output
    /// </summary>
    public partial class Form1 : Form
    {
        /// <summary>
        /// The StoredProgram object is responsible for managing and executing commands.
        /// </summary>
        private StoredProgram _program;
        /// <summary>
        /// The parser object for parsing BOOSE commands.
        /// </summary>
        private Parser _parser;
        /// <summary>
        /// The canvaswrapper responsible for drawing the output of commands.
        /// </summary>
        private CanvasWrapper _canvas;

        /// <summary>
        /// List of all commands available in BOOSE and custom commands.
        /// </summary>
        private string[] _commands;


        /// <summary>
        /// Initializes a new instance of the <see cref="Form1"/> class.
        /// Sets up the canvas,parser and program components.
        /// </summary>


        public Form1()
        {
            InitializeComponent();

            // Initialize BOOSE components
            _canvas = new CanvasWrapper(800, 600);



        var customFactory = new CustomCommandFactory(_canvas);
            _program = new StoredProgram(_canvas);
            _parser = new Parser(customFactory, _program);



        // Initialize the list of commands
        InitializeCommandList();
        }

        /// <summary>
        /// Initializes the list of all available commands in BOOSE and custom commands.
        /// </summary>
        private void InitializeCommandList()
        {
            _commands = new string[]
            {
                "moveto",
                "drawto",
                "circle",
                "rect",
                "tri",
                "write",
                "pen",

            };
        }

        /// <summary>
        /// Handles the Click event of the btn_Run control.
        /// </summary>
        /// <param name="sender">The source of the event.</param>
        /// <param name="e">The <see cref="EventArgs"/> instance containing the event data.</param>
        /// <exception cref = "ParserException" > Thrown when there is a syntax error in the script.</exception>
        /// <exception cref="StoredProgramException">Thrown when there is a runtime error in the script.</exception>
        /// <exception cref="Exception">Thrown when an unexpected error occurs during execution.</exception>
        private void btn_Run_Click(object sender, EventArgs e)
        {
            try
            {
                // Clear the canvas before running
                _canvas.Clear();
                btn_Output.Image = null;
                btn_Output.Refresh();

                // Get the script from the command textbox
                string script = btn_Cmd.Text.Trim();

                // Check for empty or whitespace-only commands
                if (string.IsNullOrWhiteSpace(script))
                {
                    btn_ConsolePnl.AppendText("No commands provided. Nothing to execute.\n");
                    return; // Stop execution
                }

                // Parse and run the script
                _parser.ParseProgram(script);
                _program.Run();

                // Display the output
                btn_Output.Image = (Image)_canvas.getBitmap();
                btn_Output.Refresh();
                btn_ConsolePnl.AppendText("Program executed successfully.\n");
            }
            catch (ParserException ex)
            {
                btn_ConsolePnl.AppendText($"Syntax Error: {ex.Message}\n");
            }
            catch (StoredProgramException ex)
            {
                btn_ConsolePnl.AppendText($"Execution Error: {ex.Message}\n");
            }
            catch (Exception ex)
            {
                btn_ConsolePnl.AppendText($"Unexpected Error: {ex.Message}\n");
            }
        }
        /// <summary>
        /// Handles the Click event of the btn_Clear control.
        /// </summary>
        /// <param name="sender">The source of the event.</param>
        /// <param name="e">The <see cref="EventArgs"/> instance containing the event data.</param>
        private void btn_Clear_Click(object sender, EventArgs e)
        {
            // Clear the canvas and console
            _canvas.Clear();
            btn_Output.Image = null;
            btn_ConsolePnl.Clear();
        }


        /// <summary>
        /// Handles the Click event of the btn_Reset control.
        /// Resets the canvas, command text box, console, and initializes default states.
        /// </summary>
        /// <param name="sender">The source of the event.</param>
        /// <param name="e">The <see cref="EventArgs"/> instance containing the event data.</param>
        private void btn_Reset_Click(object sender, EventArgs e)
        {
            try
            {
                // Clear the program's state
                _program = new StoredProgram(_canvas);

                // Reinitialize the parser with the new program
                var customFactory = new CustomCommandFactory(_canvas);
                _parser = new Parser(customFactory, _program);

                // Clear the canvas and console
                _canvas.Clear();
                _canvas.Reset();
                btn_Cmd.Text = string.Empty;
                btn_Output.Image = null;
                btn_ConsolePnl.Clear();
                btn_ConsolePnl.AppendText("Canvas and program reset. Ready for new commands.\n");
            }
            catch (Exception ex)
            {
                btn_ConsolePnl.AppendText($"Reset Error: {ex.Message}\n");
            }
        }
    }

}




