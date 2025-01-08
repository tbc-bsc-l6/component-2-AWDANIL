using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using BOOSE;

namespace Component_1
{
    /// <summary>
    /// Represents a custom command for writing text on the canvas.
    /// </summary>
    public class CustomWrite : Command
    {
        private readonly ICanvas _canvas;
        private string _text;

        /// <summary>
        /// Initializes a new instance of the <see cref="CustomWrite"/> class.
        /// </summary>
        /// <param name="canvas">The canvas where the text will be written.</param>
        public CustomWrite(ICanvas canvas)
        {
            _canvas = canvas;
        }

        /// <summary>
        /// Sets the command with the specified program and parameter list.
        /// This method processes the parameters after calling the base implementation.
        /// </summary>
        /// <param name="program">The stored program to associate with the command.</param>
        /// <param name="parameterList">The parameter list for the command.</param>
        public override void Set(StoredProgram program, string parameterList)
        {
            base.Set(program, parameterList);
            ProcessParameters(parameterList);
        }

        /// <summary>
        /// Validates the parameters for the Write command.
        /// Ensures that at least one parameter is provided.
        /// </summary>
        /// <param name="parameterList">An array of parameters to validate.</param>
        /// <exception cref="CommandException">
        /// Thrown if the number of parameters is invalid.
        /// </exception>
        public override void CheckParameters(string[] parameterList)
        {
            if (parameterList.Length < 1)
            {
                throw new CommandException("Invalid number of parameters in Write: write <text>");
            }
        }

        /// <summary>
        /// Processes the parameters for the Write command.
        /// Trims any enclosing quotes from the provided text.
        /// </summary>
        /// <param name="parameterList">The parameter list as a single string.</param>
        private void ProcessParameters(string parameterList)
        {
            _text = parameterList.Trim('"'); // Remove quotes from the text
        }

        /// <summary>
        /// Executes the Write command by writing the specified text to the canvas.
        /// </summary>
        /// <exception cref="CanvasException">
        /// Thrown if the canvas is not initialized.
        /// </exception>
        public override void Execute()
        {
            if (_canvas == null)
            {
                throw new CanvasException("Canvas not initialized.");
            }

            _canvas.WriteText(_text); // Use CanvasWrapper to write text
        }
    }

}