using BOOSE;

public class CanvasWrapper : ICanvas
{
    private Bitmap _bitmap;
    private Graphics _graphics;
    private int _x, _y;
    private Color _penColor;

    public event Action CanvasUpdated; // Event to notify updates

    public CanvasWrapper(int width, int height)
    {
        _bitmap = new Bitmap(width, height);
        _graphics = Graphics.FromImage(_bitmap);
        _graphics.Clear(Color.White);
        _penColor = Color.Black;
    }

    public object PenColour
    {
        get => _penColor;
        set => _penColor = (Color)value;
    }

    public int Xpos { get => _x; set => _x = value; }
    public int Ypos { get => _y; set => _y = value; }

    public void Circle(int radius, bool filled)
    {
        var rect = new Rectangle(_x - radius, _y - radius, radius * 2, radius * 2);
        if (filled)
        {
            using (var brush = new SolidBrush(_penColor))
            {
                _graphics.FillEllipse(brush, rect);
            }
        }
        else
        {
            using (var pen = new Pen(_penColor))
            {
                _graphics.DrawEllipse(pen, rect);
            }
        }
        _graphics.Flush();

    }

    public void Clear()
    {
        _graphics.Clear(Color.White);
        CanvasUpdated?.Invoke(); // Notify canvas updated
    }

    public void DrawTo(int x, int y)
    {
        using (var pen = new Pen(_penColor))
        {
            _graphics.DrawLine(pen, _x, _y, x, y);
        }
        _x = x;
        _y = y;
        CanvasUpdated?.Invoke(); // Notify canvas updated
    }

    public void MoveTo(int x, int y)
    {
        _x = x;
        _y = y;
        CanvasUpdated?.Invoke(); // Notify canvas updated
    }

    public void Rect(int width, int height, bool filled)
    {
        var rect = new Rectangle(_x, _y, width, height);
        if (filled)
        {
            using (var brush = new SolidBrush(_penColor))
            {
                _graphics.FillRectangle(brush, rect);
            }
        }
        else
        {
            using (var pen = new Pen(_penColor))
            {
                _graphics.DrawRectangle(pen, rect);
            }
        }
        CanvasUpdated?.Invoke(); // Notify canvas updated
    }

    public void Reset()
    {
        _x = 0;
        _y = 0;
        _penColor = Color.Black;
        CanvasUpdated?.Invoke(); // Notify canvas updated
    }

    public void Set(int width, int height)
    {
        _bitmap = new Bitmap(width, height);
        _graphics = Graphics.FromImage(_bitmap);
        _graphics.Clear(Color.White);
        CanvasUpdated?.Invoke(); // Notify canvas updated
    }

    public void SetColour(int red, int green, int blue)
    {
        _penColor = Color.FromArgb(red, green, blue);
    }

    public void Tri(int width, int height)
    {
        Point[] points =
        {
            new Point(_x, _y),
            new Point(_x + width, _y),
            new Point(_x + width / 2, _y - height)
        };
        using (var pen = new Pen(_penColor))
        {
            _graphics.DrawPolygon(pen, points);
        }
        CanvasUpdated?.Invoke(); // Notify canvas updated
    }

    public void WriteText(string text)
    {
        _graphics.DrawString(text, SystemFonts.DefaultFont, new SolidBrush(_penColor), _x, _y);
        CanvasUpdated?.Invoke(); // Notify canvas updated
    }

    public object getBitmap()
    {
        return _bitmap;
    }
}
